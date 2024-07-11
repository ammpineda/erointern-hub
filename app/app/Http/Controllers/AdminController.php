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
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Generate username
        $firstInitial = substr($request->input('first_name'), 0, 1);
        $middleInitial = $request->input('middle_name') ? substr($request->input('middle_name'), 0, 1) : '';
        $lastName = $request->input('last_name');
        $username = "$firstInitial$middleInitial$lastName";

        // Check if the username already exists
        if (User::where('username', $username)->exists()) {
            return redirect()->back()->withErrors(['username' => 'The username has already been taken.']);
        }

        try {
            // Begin transaction
            DB::beginTransaction();

            // Create new user
            $user = new User();
            $user->type = "intern";
            $user->username = $username;
            $user->first_name = $request->input('first_name');
            $user->middle_name = $request->input('middle_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->save();

            // Commit transaction
            DB::commit();
            return redirect()->route('manage-interns')->with('success', 'Intern registered successfully!');
        } catch (\Exception $e) {
            // Rollback transaction
            DB::rollBack();
            return redirect()->back();
        }
    }
    public function manageInterns()
    {

        // Retrieve all users
        $interns = User::where('type', 'intern')->get();
        // Pass the users data to the view
        return view('management.manage-interns', compact('interns'));
    }


public function registerAdmin(Request $request)
{
    // Validate the request
    $request->validate([
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|confirmed',
    ]);

    // Generate username
    $firstInitial = substr($request->input('first_name'), 0, 1);
    $middleInitial = $request->input('middle_name') ? substr($request->input('middle_name'), 0, 1) : '';
    $lastName = $request->input('last_name');
    $username = "$firstInitial$middleInitial$lastName";

    // Check if the username already exists
    if (User::where('username', $username)->exists()) {
        return redirect()->back()->withErrors(['username' => 'The username has already been taken.']);
    }

    try {
        // Begin transaction
        DB::beginTransaction();

        // Create new user
        $user = new User();
        $user->type = "admin"; // Set the user type as "admin"
        $user->username = $username;
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        // Commit transaction
        DB::commit();
        return redirect()->route('manage-admins')->with('success', 'Admin registered successfully!');
    } catch (\Exception $e) {
        // Rollback transaction
        DB::rollBack();
        return redirect()->back()->withErrors(['error' => 'An error occurred while registering the admin. Please try again.']);
    }
}

public function manageAdmins()
{
    // Retrieve all admin users
    $admins = User::where('type', 'admin')->get();

    // Pass the admin users data to the view
    return view('management.manage-admins', compact('admins'));
}}
