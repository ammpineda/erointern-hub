<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyAccomplishment;
use Illuminate\Support\Facades\Session;

class DailyAccomplishmentFormController extends Controller
{
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
                'attachment_file' => 'nullable|file|max:2048',
            ]);

            // Create a new DailyAccomplishment instance
            $dar = new DailyAccomplishment();
            $dar->title = $validatedData['title'];
            $dar->description = $validatedData['description'];
            $dar->clock_in_at = $validatedData['clock_in_at'];
            $dar->clock_out_at = $validatedData['clock_out_at'];
            $dar->user_id = Session::get('id'); // Associate the DAR with the logged-in user ID

            // Save the DailyAccomplishment to the database
            $dar->save();

            // Handle clock in and clock out images
            if ($request->hasFile('clock_in_image')) {
                $dar->clock_in_image = $request->file('clock_in_image')->store('clock_images');
                $dar->save();
            }
            if ($request->hasFile('clock_out_image')) {
                $dar->clock_out_image = $request->file('clock_out_image')->store('clock_images');
                $dar->save();
            }

            // Handle attachment file
            if ($request->hasFile('attachment_file')) {
                $dar->attachment_file = $request->file('attachment_file')->store('attachments');
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
