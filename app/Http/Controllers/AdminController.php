<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
      // Dashboard page
    public function index()
    {
        // return the dashboard view
        return view('admin.dashboard');
    }
}
