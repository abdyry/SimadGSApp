<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve all topics from the database
        $topics = Topic::all();

        // Pass the topics data to the view
        return view('dashboard', compact('topics'));
    }
}
