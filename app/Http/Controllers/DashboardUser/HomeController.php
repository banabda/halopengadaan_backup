<?php

namespace App\Http\Controllers\DashboardUser;

use App\Http\Controllers\Controller;
use App\Models\Metodepembayaran;
use App\Models\Profile;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

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

    public function registerMembership()
    {
        $profile = Profile::with('user')->where('user_id', Auth::user()->id)->first();
        $metode_pembayaran = Metodepembayaran::all()->groupBy('nama_method')->toArray();
        $invoice = Invoice::where('user_id', Auth::user()->id)->first();

        $data = [
            'metode_pembayaran' => $metode_pembayaran,
            'invoice' => $invoice
        ];

        if (is_null($profile)) {
            return redirect()->route('profile');
        } else {
            if (is_null($profile->nama_lengkap) && is_null($profile->email) && is_null($profile->no_hp)) {
                return redirect()->route('profile');
            } else {
                return view('dashboard.user.daftar-membership', $data);
            }
        }
    }

    public function saveRegisterMembership(Request $request)
    {
        $metode_pembayaran = Metodepembayaran::where('nama_provider', $request->nama_provider)->first();

        $kode_unik = rand(0,100);
        $tagihan = '';

        if ($request->paket == "1") {
            $tagihan = intval('250000');
        } elseif ($request->paket == "2") {
            $tagihan = intval('600000');
        } elseif ($request->paket == "3") {
            $tagihan = intval('1500000');
        }

        $data = [
            'user_id' => Auth::user()->id,
            'paket' => $request->paket,
            'metode_pembayaran' => $request->nama_method,
            'nama_bank' => $request->nama_provider,
            'nomor_rekening' => $metode_pembayaran->nomor_rekening,
            'kode_unik' => $kode_unik,
            'tagihan' => $tagihan + $kode_unik,
            'status' => 'Menunggu Pembayaran'
        ];

        $invoice = Invoice::create($data);

        return redirect()->route('user.dashboard.membership');
    }

    public function saveBuktiPembayaran(Request $request)
    {
        $data = $request->all();

        $user = Auth::user()->id;
        $file = $request->file('bukti_pembayaran');
        $path = 'images/konfirmasi_pembayaran/' . $user . '/' . $data['id'];
        $filename = $file->getClientOriginalName();

        $path = Storage::disk('public')->put(
            $path,
            $file
        );

        $data = [
            'nama_rekening' => $request->nama_rekening,
            'bukti_pembayaran' => $path,
            'status' => 'Telah Terbayar'
        ];

        $invoice = Invoice::where('id', $request->id)->first();
        $invoice->update($data);

        return redirect()->route('user.dashboard.membership');

    }

    public function getProviders($value)
    {
        $payment_method = Metodepembayaran::where('nama_method', $value)->pluck('nama_provider', 'id');
        return json_encode($payment_method);

    }

    public function invoiceprofil()
    {
      $data = Invoice::all();
      if(request()->ajax()){
          return DataTables::of($data)
            ->rawColumns()
            ->addIndexColumn()
            ->make(true);

      }
      return view('dashboard.user.invoiceprofil');
    }

}




