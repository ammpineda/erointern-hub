<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // checks email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'No user found with this email address.']);
        }

        // change to password_verify later
        if ($request->password !== $user->password) {
            return redirect()->back()->withErrors(['error' => 'Incorrect Password.']);
        } 

        if($user->type == 'intern'){
            Session::put('id', $user->id);
            Session::put('is_intern', true);
            Session::put('is_admin', false);
            return redirect()->route('intern-dashboard')->with('success', 'You may now enroll or access your enrolled courses.');
        } elseif ($user->type == 'admin'){
            // return to admin-dashboard view
        }

        
    }
}
