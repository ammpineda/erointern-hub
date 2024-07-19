<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // checks email
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'No user found with this username.']);
        }

        // change to password_verify later
        if (!password_verify($request->password, $user->password)) {
            return redirect()->back()->withErrors(['error' => 'Incorrect Password.']);
        }

         // Update the last_login_at column with the current timestamp
         $user->last_login_at = Carbon::now();
         $user->save();

        if($user->type == 'intern'){
            Session::put('id', $user->id);
            Session::put('is_intern', true);
            Session::put('is_admin', false);
            return redirect()->route('intern-dashboard')->with('success', 'You may now enroll or access your enrolled courses.');

        } elseif ($user->type == 'admin'){
            // return to admin-dashboard view
            Session::put('id', $user->id);
            Session::put('is_intern', false);
            Session::put('is_admin', true);
            return redirect()->route('admin-dashboard')->with('success', 'You may now enroll or access your enrolled courses.');
        }
    }
}
