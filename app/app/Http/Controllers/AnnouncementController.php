<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnnouncementController extends Controller
{
public function displayAnnouncements()
{
    // Retrieve all announcements with the associated user, ordered by creation date
    $announcements = Announcement::with('user')->orderBy('created_at', 'desc')->get();

    // Pass the announcements data to the view
    return view('management.manage-announcements', compact('announcements'));

   ;}
   public function interndisplayAnnouncements()
{
    // Retrieve all announcements with the associated user, ordered by creation date
    $announcements = Announcement::with('user')->orderBy('created_at', 'desc')->get();

    // Pass the announcements data to the view
    return view('client.announcements', compact('announcements'));

   ;}

public function addAnnouncement(Request $request)
    {

        // If request method is GET, display the form
        if ($request->isMethod('get')) {
            return view('management.manage-announcements');
        }

        // If request method is POST, handle form submission
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Retrieve user ID from session
        $userId = Session::get('id');

        // Check if the user ID is in the session
        if (!$userId) {
            return redirect()->route('login.form')->withErrors(['error' => 'User is not authenticated.']);
        }

        // Create the new announcement using the session-stored user ID
        Announcement::create([
            'user_id' => $userId,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Redirect to the announcements list with a success message
        return redirect()->route('display-announcements')->with('success', 'Announcement created successfully.');
    }
    public function deleteAnnouncement(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->back()->with('success', 'Announcement deleted successfully.');
    }
}
