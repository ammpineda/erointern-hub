<?php

namespace App\Http\Controllers;

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
            $user->password = bcrypt($request->input('password')); // Ensure to hash the password
            $user->save();

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


    public function manageInterns()
    {

        // Retrieve all users
        $interns = User::where('type', 'intern')->get();
        // Pass the users data to the view
        return view('management.manage-interns', compact('interns'));
    }

}


