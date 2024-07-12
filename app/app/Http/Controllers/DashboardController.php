<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Announcement;
use App\Models\DailyAccomplishment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the user ID from the authenticated user or any other data source
        $userId = Session::get('id');

        $latestAnnouncements = Announcement::latest()->limit(4)->get();

        $userId = Session::get('id');
        $latestAnnouncements = Announcement::latest()->limit(4)->get();
        $dailyAccomplishments = DailyAccomplishment::where('user_id', $userId)
                                ->latest()
                                ->limit(4)
                                ->get();




        // Pass the $userId variable to the dashboard view
        return view('client.dashboard',compact('latestAnnouncements'))->with('userId', $userId)
        ->with('latestAnnouncements', $latestAnnouncements)
        ->with('dailyAccomplishments', $dailyAccomplishments);

    }



    // Return the client dashboard view with the latest announcements

public function ManagementDash()
{
    $dailyAccomplishments = DailyAccomplishment::with('user')->latest()->limit(4)->get();
    $latestAnnouncements = Announcement::latest()->limit(4)->get();

    // Return the management dashboard view with the latest announcements
    return view('management.dashboard')
    ->with('latestAnnouncements', $latestAnnouncements)
    ->with('dailyAccomplishments', $dailyAccomplishments);
}
}
