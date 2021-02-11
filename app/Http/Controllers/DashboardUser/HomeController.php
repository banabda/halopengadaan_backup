<?php

namespace App\Http\Controllers\DashboardUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->session()->get('paket');
        return view('landing.content', compact('data'));
    }
}
