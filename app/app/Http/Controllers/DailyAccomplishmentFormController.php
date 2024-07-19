<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\DailyAccomplishment;
use Illuminate\Support\Facades\Session;

class DailyAccomplishmentFormController extends Controller
{
    public function ShowAccomplishment($id){
        $accomplishment = DailyAccomplishment::with('User')->findOrFail($id);
        return view('management.manage-dars', compact('accomplishment'));
    }

    public function index()
    {
        // Get today's date in the correct format for comparison
        $todayDate = Carbon::today()->toDateString();

        // Fetch accomplishments where created_at is today's date and is_approved is false
        $accomplishments = DailyAccomplishment::where(function ($query) use ($todayDate) {
                $query->whereDate('created_at', $todayDate)
                      ->orWhere('is_approved', 0); // Adding OR condition for is_approved = false
            })
            ->get();

        return view('management.manage-dars', compact('accomplishments'));
    }
    public function submit(Request $request)
{
    // Check if the user is logged in
    if (Session::has('id')) {
        // Validation
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'clock_in_at' => 'required|date_format:H:i',
            'clock_out_at' => 'required|date_format:H:i',
            'attachment_file' => '|string|max:2048',
        ]);

        // Check if the user has already submitted a DAR for the same day
        $userId = Session::get('id');
        $today = Carbon::today();
        $existingDAR = DailyAccomplishment::where('user_id', $userId)
                                        ->whereDate('created_at', $today)
                                        ->first();

        if ($existingDAR) {
            // User has already submitted a DAR for the same day
            return redirect()->route('intern-dashboard')->withErrors(['error' => 'You have already submitted a Daily Accomplishment Report for today.']);
        }

        //creates converts time from clock in input to format acceptable to db
        $clockIn = Carbon::createFromFormat('H:i', $validatedData['clock_in_at']);
        $clockOut = Carbon::createFromFormat('H:i', $validatedData['clock_out_at']);

        // Create a new DailyAccomplishment instance
        $dar = new DailyAccomplishment();
        $dar->title = $validatedData['title'];
        $dar->description = $validatedData['description'];

        $dar->attachment_file = $validatedData['attachment_file'];
        $dar->user_id = $userId; // Associate the DAR with the logged-in user ID
        $dar->clock_in_at = $clockIn;  // Assuming $clockIn is a valid Carbon instance
        $dar->clock_out_at = $clockOut; // Assuming $clockOut is a valid Carbon instance
        $dar->is_approved = 0;
        $dar->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Daily Accomplishment Report submitted successfully!');
    } else {
        // User is not logged in, handle this scenario (e.g., redirect to login page)
        return redirect()->route('login.form')->withErrors(['error' => 'You must be logged in to submit a Daily Accomplishment Report.']);
    }
}
public function approveDAR($id){
    $dar = DailyAccomplishment::findOrFail($id);
    $dar->is_approved = 1;
    $dar->save();

    $user = $dar->user;
    $ojtDetails = $user->ojtDetails;
    $clockIn = $dar->clock_in_at;
    $clockOut = $dar->clock_out_at;

    $clockInTime = Carbon::parse($clockIn);
    $clockOutTime = Carbon::parse($clockOut);

    $rendered_hours = $clockInTime->diffInHours($clockOutTime);

    $ojtDetails->rendered_hours += $rendered_hours;
    $ojtDetails->save();

    return back();
}

}
