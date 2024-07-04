<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\DailyAccomplishment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UserDARController extends Controller
{
    public function userDars($userId)
    {
        // Fetch the daily accomplishments for the specific user
        $accomplishments = DailyAccomplishment::where('user_id', $userId)->get();

        // Return the view with the accomplishments and user information
        return view('client.dars', compact('accomplishments', 'userId'));
    }
}
