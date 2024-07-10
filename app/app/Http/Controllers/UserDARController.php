<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\DailyAccomplishment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDARController extends Controller
{

    public function userDars($userId)
{
    // Fetch the user by ID
    $user = User::findOrFail($userId);

    // Fetch the daily accomplishments for the specific user
    $accomplishments = DailyAccomplishment::where('user_id', $user->id)->get();

    // Return the view with the accomplishments and user information
    return view('client.dars', compact('accomplishments', 'user'));
}
}
