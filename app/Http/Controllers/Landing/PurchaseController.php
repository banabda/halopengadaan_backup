<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function savePaket(Request $request, $id)
    {
        $data = $request->all();
        dd($data);
    }
}
