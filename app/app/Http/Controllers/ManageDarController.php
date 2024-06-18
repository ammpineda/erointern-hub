<?php

namespace App\Http\Controllers;

use App\Models\DailyAccomplishment;
use Illuminate\Http\Request;

class ManageDarController extends Controller
{
    public function index()
    {
        // Fetch all daily accomplishments with the related user
        $accomplishments = DailyAccomplishment::with('user')->get();

        // Return the view with the accomplishments from the management directory
        return view('management.manage-dars', compact('accomplishments'));
    }
}
