<?php

namespace App\Http\Controllers\DashboardNarasumber;

use App\Http\Controllers\Controller;
use App\Models\NarasumberProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NarasumberController extends Controller
{
    public function register()
    {
        return view('narasumber.register');
    }

    public function saveRegister(Request $request)
    {
        $data = $request->all();

        // $this->validate($request,[
        //     'name' => 'required|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed'
        // ]);
        $this->validator($request->all())->validate();


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'Belum Teraktifasi'
        ]);

        $user->assignRole('narasumber');

        return response()->json([
            'status' => 'ok',
            'messages' => 'Pendaftaran Berhasil! Menunggu Konfirmasi Admin',
            'route' => route('login')
        ]);

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function profile()
    {
        $user = User::with('profileNarasumber')->where('id', Auth::user()->id)->first();
        $data = [
            'user' => $user
        ];
        // dd($user->profileNarasumber);
        return view('dashboard.narasumber.profile', $data);
    }

    public function saveProfile(Request $request)
    {
        $data = $request->all();
        $user = Auth::user()->id;
        $file = $request->file('cv');
        $path = 'dokumen/narasumber/cv/' . $user ;
        $path = Storage::disk('public')->put(
            $path,
            $file
        );

        $data['cv'] = $path;

        $profile = NarasumberProfile::create($data);

        return redirect()->route('narasumber.dashboard.profile');

    }
}
