<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();

        $data = [
            'artikel' => $artikel
        ];
        // dd($data);

        return view('home', $data);
    }
}
