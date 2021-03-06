<?php

namespace App\Http\Controllers\DashboardUser;

use App\Http\Controllers\Controller;
use App\Models\Metodepembayaran;
use App\Models\Profile;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Message;
use App\Models\UserhasPaket;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->session()->get('paket');
        return view('landing.content', compact('data'));
    }

    public function profile()
    {
        $user = User::with('profile', 'userHasPaket')->where('id', Auth::user()->id)->first();

        $data = [
            'user' => $user
        ];

        return view('dashboard.user.profile', $data);
    }

    public function saveProfile(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data = [
            'user_id' => $request->user_id,
            'is_complete' => $request->is_complete,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $user->email,
            'no_hp' => $request->no_hp,
            'jenis_kerja' => $request->jenis_kerja,
            'status' => $request->status,
            
        ]; 
        // $request->all();
        // dd($data, $user);
        $validator = Validator::make($data, array(
            'nama_lengkap' => "required",
            'email' => "required",
            'no_hp' => "required",
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
        $invoice = Invoice::where('user_id', Auth::user()->id)->latest()->first();
        $userhaspaket = UserhasPaket::where('user_id', Auth::user()->id)->first();
        // dd($invoice);
        $data = [
            'metode_pembayaran' => $metode_pembayaran,
            'invoice' => $invoice,
            'userhasPaket' => $userhaspaket
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
        $profile = Profile::where('user_id', Auth::user()->id)->first();

        $kode_unik = rand(0,100);
        $tagihan = '';

        if ($request->paket == "1") {
            $tagihan = intval('50000');
        } elseif ($request->paket == "2") {
            $tagihan = intval('250000');
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



        $dataWa = [
            'phone' => $profile->no_hp,
            'nama_lengkap' => $profile->nama_lengkap,
            'email' => $profile->email,
            'tagihan' => $data['tagihan'],
            'nomor_rekening' => $data['nomor_rekening'],
            'nama_bank' => $data['nama_bank']
        ];

        $this->waSaveRegisterMembership($dataWa);
        $invoice = Invoice::create($data);
        return redirect()->route('user.dashboard.membership');
    }

    public function saveBuktiPembayaran(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $profile = Profile::where('user_id', Auth::user()->id)->first();

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

        $dataWa = [
            'phone' => $profile->no_hp,
            'nama_lengkap' => $profile->nama_lengkap,
            'email' => $profile->email,
            'tagihan' => $invoice->tagihan,
        ];

        $this->waSaveBuktiPembayaran($dataWa);

        return response()->json([
            'status' => 'ok',
            'messages' => 'Upload Berhasil!',
            'route' => route('user.dashboard.membership')
        ]);

        // return redirect()->route('user.dashboard.membership');

    }

    public function getProviders($value)
    {
        $payment_method = Metodepembayaran::where('nama_method', $value)->pluck('nama_provider', 'id');
        return json_encode($payment_method);
    }

    public function invoiceprofil()
    {
        // Terkonfirmasi
        $profile = Profile::with('user')->where('user_id', Auth::user()->id)->first();
        if (is_null($profile)) {
            return redirect()->route('profile');
        } else {

            $data = Invoice::with('user')->where('user_id', Auth::user()->id)->wherein('status', ['Menunggu Pembayaran',
                    'Telah Terbayar'])->get();

            if(request()->ajax()){
                return DataTables::of($data)
                  ->addColumn('total_tagihan', function($tagihan){
                      return 'Rp. '.number_format($tagihan->tagihan,0, ',', '.');
                  })
                  ->addColumn('tanggal', function($tanggal){
                      return Carbon::parse($tanggal->created_at)->format('d F Y');
                  })
                  ->addColumn('paket_detail', function($paket){
                      if ($paket->paket == "1") {
                          return 'Silver';
                      }
                      elseif ($paket->paket == "2") {
                          return 'Gold';
                      }
                      else {
                          return 'Platinum';
                      }
                  })
                  ->addColumn('action', function($action){
                      $btn = '<a class="btn btn-md btn-info mr-2" href="'. route("user.dashboard.cetak", $action->id) .'">
                  <i class="fa fa-print mr-2"></i>cetak</a>';
                  return $btn;
                  })
                  ->rawColumns(['total_tagihan', 'tanggal', 'paket_detail', 'action'])
                  ->addIndexColumn()
                  ->make(true);
            }
        }

        return view('dashboard.user.invoiceprofil');
    }

    public function kwitansiProfil()
    {
        $profile = Profile::with('user')->where('user_id', Auth::user()->id)->first();
        if (is_null($profile)) {
            return redirect()->route('profile');
        } else {
            $data = Invoice::with('user')->where([
                ['user_id', Auth::user()->id],
                ['status', 'Terkonfirmasi']
            ])->get();

            if(request()->ajax()){
                return DataTables::of($data)
                  ->addColumn('total_tagihan', function($tagihan){
                      return 'Rp. '.number_format($tagihan->tagihan,0, ',', '.');
                  })
                  ->addColumn('tanggal', function($tanggal){
                      return Carbon::parse($tanggal->updated_at)->format('d F Y');
                  })
                  ->addColumn('paket_detail', function($paket){
                      if ($paket->paket == "1") {
                          return 'Silver';
                      }
                      elseif ($paket->paket == "2") {
                          return 'Gold';
                      }
                      else {
                          return 'Platinum';
                      }
                  })
                  ->addColumn('action', function($action){
                      $btn = '<a class="btn btn-md btn-info mr-2" href="'. route("user.dashboard.cetak", $action->id) .'">
                            <i class="fa fa-print mr-2"></i>cetak</a>';
                  return $btn;
                  })
                  ->rawColumns(['total_tagihan', 'tanggal', 'paket_detail', 'action'])
                  ->addIndexColumn()
                  ->make(true);
            }

            return view('dashboard.user.kwitansi');
        }
    }

    public function konsultasi()
    {
        $userhaspaket = UserhasPaket::where('user_id', Auth::user()->id)->first();
        $invoice = Invoice::where('user_id', Auth::user()->id)->latest()->first();
        $message = Message::where('invoice_id', $invoice->id)->first();
        // dd($message);
        if (is_null($userhaspaket)) {
            return redirect()->route('user.dashboard.membership');
        } elseif ($userhaspaket->expired_at <= Carbon::now()) {
            return redirect()->route('user.dashboard.membership');
        }
        else {

            $data = [
                'userHasPaket' => $userhaspaket,
                'invoice' => $invoice,
                'message' => $message
            ];

            return view('dashboard.user.konsultasi', $data);
        }

    }

    public function konsultasiZoom(Request $request)
    {
        $data = [
            'invoice_id' => $request->invoice_id,
            'user_id' => $request->user_id,
            'judul' => $request->judul,
            'message' => $request->message,
            'status' => 'Pesan Terkirim'
        ];

        $userhaspaket = UserhasPaket::where('user_id', $request->user_id)->first();
        $userhaspaket->status = 'Tidak Aktif';
        $userhaspaket->save();

        $message = Message::create($data);
        return redirect()->route('user.dashboard.konsultasi');
    }

    public function laporan($id)
    {
        $invoice = Invoice::with('user', 'user.profile')->where('id', $id)->first();

        $data = [
            'invoice' => $invoice
        ];

        // $invoice = Invoice::where('id',$id)->get();
        // $nama = Invoice::join('users', 'users.id', 'invoice.user_id')
        //         ->select('users.name')->where('invoice.id', $id)->first();
        // $nama_orang = $nama->name;

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(

            view::make('dashboard.user.cetak', $data)
        );

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('Invoice Halo Pengadaan');

        // $pdf = PDF::loadview('dashboard.user.cetak',['invoice'=>$invoice, 'nama_orang' => $nama_orang]);
        // return $pdf->stream();
        // $tgl=Carbon::parse($inv->tgl_rek_cetak)->formatLocalized('%d %B %Y');
        // $invoice = Invoice::all();
        // $pdf = PDF::loadview('dashboard.user.cetak',['cetak'=>$invoice]);
        // return $pdf->download('dashboard.user.pdf');
        // return $pdf->stream();
    }

    public function waSaveRegisterMembership($dataWa)
    {
        // dd($dataWa);
        $message = '
            Halo Bapak / Ibu '. $dataWa['nama_lengkap'] .'

Terima Kasih Telah Mendaftar Di Halo Pengadaan
Silahkan Melakukan Pembayaran Melalui Nomor Rekening Berikut :

*No Rek* : '. $dataWa['nomor_rekening'] .' ('. $dataWa['nama_bank'] .')
*Atas Nama* : Lembaga Pengembangan dan Konsultasi Nasional
*Berjumlah* : Rp. '. number_format($dataWa['tagihan'],0, ',', '.') .'

Jika sudah melakukan pembayaran, dimohon upload bukti transfer beserta nama rekening ke
Website Resmi Halo Pengadaan
        ';

        if(substr($dataWa['phone'],0,1) == '0'){
            $phone = substr_replace($dataWa['phone'],"",0,1);
        } else {
            $phone = $dataWa['phone'];
        }

        $data = [
            'body' => $message,
            'phone' => '62'. $phone
        ];

        $client = new Client();
        $data = $client->request('POST', 'https://api.chat-api.com/instance152953/sendMessage?token=t1b8ecaydchc89fz', [
            'form_params' => $data
        ])->getBody()->getContents();

    }

    public function waSaveBuktiPembayaran($dataWa)
    {

        $message = '
            Halo Bapak/Ibu '. $dataWa['nama_lengkap'] .'

Bukti Pembayaran Anda Telah Kami Terima Sebesar *Rp. '. number_format($dataWa['tagihan'],0, ',', '.') .'*,

Mohon Menunggu Untuk Di Konfirmasi Oleh Admin Agar Akun Anda Teraktifasi.

Terima Kasih
        ';

        if(substr($dataWa['phone'],0,1) == '0'){
            $phone = substr_replace($dataWa['phone'],"",0,1);
        } else {
            $phone = $dataWa['phone'];
        }

        $data = [
            'body' => $message,
            'phone' => '62'. $phone
        ];

        $client = new Client();
        $data = $client->request('POST', 'https://api.chat-api.com/instance152953/sendMessage?token=t1b8ecaydchc89fz', [
            'form_params' => $data
        ])->getBody()->getContents();

    }



}



