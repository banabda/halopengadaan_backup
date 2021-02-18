<?php

namespace App\Http\Controllers\DashboardUser;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $user = User::with('profile')->where('id', Auth::user()->id)->first();

        $data = [
            'user' => $user
        ];
        return view('dashboard.user.profile', $data);
    }

    public function saveProfile(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, array(
            'nama_lengkap' => "required",
            'email' => "required",
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

        $profile = Profile::with('user')->where('user_id', Auth::user()->id)->first();

        if (!is_null($profile)) {
            $profile->user_id = $data['user_id'];
            $profile->nama_lengkap = $data['nama_lengkap'];
            $profile->email = $data['email'];
            $profile->no_hp = $data['no_hp'];
            $profile->alamat_rumah = $data['alamat_rumah'];
            $profile->alamat_kerja = $data['alamat_kerja'];
            $profile->jenis_kerja = $data['jenis_kerja'];
            $profile->status = $data['status'];
            $profile->is_complete = 1;
            $profile->save();

            $user = User::with('profile')->where('id', Auth::user()->id)->first();
            $user->email = $data['email'];
            $user->name = $data['nama_lengkap'];
            $user->save();
        } else {
            $createProfile = Profile::create($data);
        }

        return redirect()->route('profile');
    }

    public function uploadPicture(Request $request)
    {

        $data = $request->all();
        $this->validate($request, [
            'foto' => 'required|mimes:png,jpg,jpeg'
        ]);

        $user = Auth::user()->id;
        $file = $request->file('foto');
        $path = 'images/foto_profile/' . $user ;
        $filename = $file->getClientOriginalName();

        $path = Storage::disk('public')->put(
            $path,
            $file
        );

        $data['foto'] = $path;
        $profile = Profile::with('user')->where('user_id', Auth::user()->id)->first();
        // dd($data['foto']);
        if (!is_null($profile)) {
            Storage::disk('public')->delete($profile->foto);
            $profile->update([
                'foto' => $data['foto']
            ]);
        } else {
            Profile::create([
                'user_id' => Auth::user()->id,
                'foto' => $data['foto']
            ]);
        }

        return redirect()->route('profile');
    }
}
