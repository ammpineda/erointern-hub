<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the user ID from the authenticated user or any other data source
        $userId = Session::get('id');

        // Pass the $userId variable to the dashboard view
        return view('client.dashboard')->with('userId', $userId);
    }}
