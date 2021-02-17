<?php

namespace App\Http\Controllers\DashboardUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->session()->get('paket');
        return view('landing.content', compact('data'));
    }

    public function profile()
    {
        // Auth::user()->email();
        // dd(Auth::user()->name);
        return view('dashboard.user.profile');
    }

    public function saveProfile(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, array(
            'nama_lengkap' => "required",
            'email' => "unique:users",
            'no_hp' => "required",
            'alamat_rumah' => "required",
            'alamat_kerja' => "required",
            'jenis_kerja'  => "required",
            'status' => "required"
        ));

        if ($validator->fails()) {
            return response()->json([
                'status'    => "fail",
                'messages' => $validator->errors()->first(),
            ], 422);
        }
        
        dd($data);
    }
}
