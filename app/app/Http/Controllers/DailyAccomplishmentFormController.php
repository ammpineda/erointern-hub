<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\DailyAccomplishment;
use Illuminate\Support\Facades\Session;

class DailyAccomplishmentFormController extends Controller
{
    public function index()
    {
        // Fetch all daily accomplishments with the related user
        $accomplishments = DailyAccomplishment::with('user')->get();

        // Return the view with the accomplishments from the management directory
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
                'clock_in_image' => 'nullable|image|max:2048',
                'clock_out_image' => 'nullable|image|max:2048',
                'attachment_file' => 'required|file|max:2048',
            ]);
            //creates converts time from clock in input to format acceptable to db
            $clockIn = Carbon::createFromFormat('H:i', $validatedData['clock_in_at']);
            $clockOut = Carbon::createFromFormat('H:i', $validatedData['clock_out_at']);

            // Create a new DailyAccomplishment instance

            $dar = new DailyAccomplishment();
            $dar->title = $validatedData['title'];
            $dar->description = $validatedData['description'];

            $dar->user_id = Session::get('id'); // Associate the DAR with the logged-in user ID
            $dar->clock_in_at = $clockIn;  // Assuming $clockIn is a valid Carbon instance
            $dar->clock_out_at = $clockOut; // Assuming $clockOut is a valid Carbon instance
            $dar->save();

            // Handle clock in and clock out images
            if ($request->hasFile('clock_in_image')) {
                $dar->clock_in_image = $request->file('clock_in_image')->store('clock_in_images');
                $dar->save();
            }
            if ($request->hasFile('clock_out_image')) {
                $dar->clock_out_image = $request->file('clock_out_image')->store('clock_out_images');
                $dar->save();
            }

            // Handle attachment file
            if ($request->hasFile('attachment_file')) {
                $dar->attachment_file = $request->file('attachment_file')->store('attachment_file');
                $dar->save();
            }

            // Redirect back with success message
            return redirect()->back()->with('success', 'Daily Accomplishment Report submitted successfully!');
        } else {
            // User is not logged in, handle this scenario (e.g., redirect to login page)
            return redirect()->route('login.form')->withErrors(['error' => 'You must be logged in to submit a Daily Accomplishment Report.']);
        }

    }
}
