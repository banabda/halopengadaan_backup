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
        $data = [
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'cv' => $request->cv,
            'keahlian_utama' => $request->keahlian_utama,
            'keahlian_pendukung' => $request->keahlian_pendukung,
            'status' => 'Belum Terverifikasi'
        ];
        // dd($data);
        $profile = NarasumberProfile::with('user')->where('user_id', Auth::user()->id)->first();

        if (is_null($profile)) {
            // dd('Profile Kosong');
            $user = Auth::user()->id;
            $file = $request->file('cv');
            $path = 'dokumen/narasumber/cv/' . $user ;
            $path = Storage::disk('public')->put(
                $path,
                $file
            );

            $data['cv'] = $path;

            $createProfile = NarasumberProfile::create($data);

        } else {
            // dd('Profile Update');

            // Jika Request CV Tidak Null
            if ($request->cv != null) {
                Storage::disk('public')->delete([
                    $profile->cv
                ]);

                $user = Auth::user()->id;
                $file = $request->file('cv');
                $path = 'dokumen/narasumber/cv/' . $user ;
                $path = Storage::disk('public')->put(
                    $path,
                    $file
                );

                $data['cv'] = $path;

                $profile->cv = $data['cv'];
            }

            $profile->user_id = $data['user_id'];
            $profile->name = $data['name'];
            $profile->email = $data['email'];
            $profile->no_hp = $data['no_hp'];
            $profile->keahlian_utama = $data['keahlian_utama'];
            $profile->keahlian_pendukung = $data['keahlian_pendukung'];
            $profile->save();

            $user =  User::with('profileNarasumber')->where('id', $profile->user_id)->first();
            $user->email = $data['email'];
            $user->name = $data['name'];
            $user->save();

        }


        return redirect()->route('narasumber.dashboard.profile');

    }
}
