<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $artikel = Artikel::limit(9)->get();

        $data = [
            'artikel' => $artikel
        ];

        return view('home', $data);
    }
}
