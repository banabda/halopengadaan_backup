<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function savePaket(Request $request, $id)
    {
        $data = $request->all();
        $request->session()->put('paket', $id);
        
        return redirect()->route('register');

    }
}
