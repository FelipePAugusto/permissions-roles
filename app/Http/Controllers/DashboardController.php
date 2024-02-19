<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 


class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $posts = Post::query()->paginate(10);
        
        return view('dashboard', ['posts' => $posts]);
    }
}

// layouts.template
// dashboard