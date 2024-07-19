<?php

namespace App\Http\Controllers;

use App\Models\JobDetail;
use App\Models\OjtDetail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function registerIntern(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
        ]);

        // Generate username
        $firstInitial = strtolower(substr($request->input('first_name'), 0, 1));
        $middleInitial = $request->input('middle_name') ? strtolower(substr($request->input('middle_name'), 0, 1)) : '';
        $lastName = strtolower($request->input('last_name'));
        $username = "{$firstInitial}{$middleInitial}{$lastName}";

        try {
            // Begin transaction
            DB::beginTransaction();

            // Check if the username already exists
            if (User::where('username', $username)->exists()) {
                return redirect()->back()->withErrors(['username' => 'The username has already been taken.']);
            }

            // Create new user
            $user = new User();
            $user->type = "intern";
            $user->username = $username;
            $user->first_name = $request->input('first_name');
            $user->middle_name = $request->input('middle_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = $request->input('password'); // Ensure to hash the password
            $user->save();

            // Create OjtDetail for the user with default values
            $ojtDetail = new OjtDetail();
            $ojtDetail->user_id = $user->id;
            $ojtDetail->required_hours = 0; // Default value
            $ojtDetail->rendered_hours = 0; // Default value
            $ojtDetail->remaining_hours = 0; // Default value
            $ojtDetail->has_endorsement_letter = false; // Default value
            $ojtDetail->has_acceptance_letter = false; // Default value
            $ojtDetail->onboard_at = null; // Default value
            $ojtDetail->exit_at = null; // Default value
            $ojtDetail->save();

            // Create JobDetail for the user with default values
            $jobDetail = new JobDetail();
            $jobDetail->user_id = $user->id;
            $jobDetail->department = 'Not Assigned'; // Default value
            $jobDetail->job_title = 'Not Assigned'; // Default value
            $jobDetail->supervisor = 'Not Assigned'; // Default value
            $jobDetail->save();

            // Commit transaction
            DB::commit();

            // Redirect with success message
            return redirect()->back()->with('success', 'Intern registered successfully!');
        } catch (\Exception $e) {
            // Rollback transaction
            DB::rollBack();

            // Redirect with specific error message
            return redirect()->back()->withErrors(['error' => 'Failed to register intern. ' . $e->getMessage()]);
        }
    }
    public function deactivatedInterns()
    {
        // Retrieve all users
        $interns = User::where('type', 'intern')->with('jobDetails', 'ojtDetails')->get();        // Pass the users data to the view
        return view('management.deactivated-interns', compact('interns'));
    }

    public function manageInterns()
    {
        // Retrieve all users
        $interns = User::where('type', 'intern')->with('jobDetails', 'ojtDetails')->get();        // Pass the users data to the view
        return view('management.manage-interns', compact('interns'));
    }
    Public function deactivate($id)
    {
        // Find the intern by ID
        $intern = User::findOrFail($id);

        // Update the is_active value to false
        $intern->is_active = false;
        $intern->save();

        // Redirect back or to a different page
        return redirect()->back()->with('success', 'Intern deactivated successfully.');
    }
}

