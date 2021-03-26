<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Message;
use App\Models\NarasumberProfile;
use App\Models\Profile;
use App\Models\User;
use App\Models\UserhasPaket;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.components.content');
    }

    public function invoice()
    {
        $data = Invoice::with('user')->get();

        if (request()->ajax()) {
            return DataTables()->of($data)
            ->addColumn('nama_lengkap', function($nama_lengkap) {
                return $nama_lengkap->user->name;
            })
            ->addColumn('email', function($email){
                return $email->user->email;
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
            ->addColumn('total_tagihan', function($tagihan){
                return 'Rp. '.number_format($tagihan->tagihan,0, ',', '.');
            })
            ->addColumn('tanggal', function ($tanggal) {
                return Carbon::parse($tanggal->updated_at)->format('d F Y');
            })
            ->addColumn('action', function($action){

                if ($action->status == "Telah Terbayar") {
                    $btn = '<button class="btn btn-xs btn-info invoice-confirm" id="'. $action->id .'">Konfirmasi</button>';
                } elseif ($action->status == "Terkonfirmasi") {
                    $btn = '<button class="btn btn-xs btn-info" style="cursor: not-allowed;" disabled>Telah Terkonfirmasi</button>';
                } elseif ($action->status = "Menunggu Pembayaran") {
                    $btn = '<button class="btn btn-xs btn-info" style="cursor: not-allowed;" disabled>Belum Bayar</button>';
                }
                return $btn;
            })
            ->addColumn('foto', function($foto){
                return "<a target='_blank' href='". Storage::url($foto->bukti_pembayaran) ."'><img src=". Storage::url($foto->bukti_pembayaran). " height='150px' width='auto' alt='". $foto->bukti_pembayaran ."'></a>";
            })
            ->rawColumns(['nama_lengkap', 'email', 'paket_detail', 'total_tagihan', 'tanggal', 'action', 'foto'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('dashboard.admin.data-invoice');
    }

    public function prosesInvoice($id)
    {
        $data = Invoice::where('id', $id)->first();
        // dd($data);
        $profile = Profile::where('user_id', $data->user_id)->first();
        $userHasPaket = UserhasPaket::where('user_id', $data->user_id)->first();

        $expired_at =  '';
        if ($data->paket == "1") {
            $expired_at = Carbon::now()->addDays(30)->toDateTimeString();
            $saldo = 1;
        } elseif ($data->paket == "2") {
            $expired_at = Carbon::now()->addDays(60)->toDateTimeString();
            $saldo = 2;
        } elseif($data->paket == "3") {
            // $date_zoom = $data->date_zoom;

            // $dayExpired_at = intval(Carbon::parse($date_zoom)->format('d')) - Carbon::now()->format('d');

            // $hourExpired_at = intval(Carbon::parse($date_zoom)->format('H'));

            // $expired_at = Carbon::now()->addDays($dayExpired_at)->addHours($hourExpired_at)->toDateTimeString();

            $expired_at = Carbon::now()->addDays(1)->toDateTimeString();
            $saldo = 0;
        }

        $data->update([
            'status' => 'Terkonfirmasi'
        ]);

        if (is_null($userHasPaket)) {
            $userPaket = UserhasPaket::create([
                'user_id' => $data->user_id,
                'paket' => $data->paket,
                'expired_at' => $expired_at,
                'saldo' => $saldo,
                'status' => 'Aktif'
            ]);
        } else {
            $userHasPaket->update([
                'paket' => $data->paket,
                'expired_at' => $expired_at,
                'saldo' => $saldo
            ]);
        }

        $dataWa = [
            'phone' => $profile->no_hp,
            'nama_lengkap' => $profile->nama_lengkap,
            'email' => $profile->email
        ];

        $this->waProsesInvoice($dataWa);

        return response()->json([
            'status' => "ok"
        ]);

    }

    public function dataNarasumber(Request $request)
    {
        $data = User::whereHas(
            'roles', function($role){
                $role->where('name', 'narasumber');
            }
        );

        if ($request->ajax()) {
            return DataTables()->of($data)
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if (!empty($request->get('status'))) {
                    $status = $request->get('status');
                    if ($status != -1) {
                        $query->where('status', $status);
                    }
                }
            })
            ->addColumn('nomor', function(){
                $no = 1;
                return $no++;
            })
            ->addColumn('action', function($row){
                if ($row->status == "Belum Teraktifasi") {
                    $btn = '<button class="btn btn-xs btn-info user-confirm" id="'. $row->id .'">Aktifasi</button>';
                } else {
                    $btn = '<button class="btn btn-xs btn-info invoice-confirm" id="'. $row->id .' style="cursor: not-allowed;" disabled>Telah Aktif</button>';
                }

                return $btn;
            })
            ->rawColumns(['action', 'nomor'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('dashboard.admin.data-narasumber');
    }

    public function verifyUserNarasumber($id)
    {
        $data = User::where('id', $id)->first();
        $data->update([
            'status' => 'Teraktifasi'
        ]);
        $data->save();
        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function dataNarasumberProfile(Request $request)
    {
        $data = User::with('profileNarasumber')->whereHas(
            'roles', function($role){
                $role->where('name', 'narasumber');
            }
        );
        // dd($data);
        if (request()->ajax()) {
            return DataTables()->of($data)
            // ->addIndexColumn()
            // ->filter(function ($query) use ($request) {
            //     if (!empty($request->get('status'))) {
            //         $status = $request->get('status');
            //         if ($status != -1) {
            //             $query->where('status', $status);
            //         }
            //     }
            // })
            ->addColumn('nomor', function(){
                $no = 1;
                return $no++;
            })
            ->addColumn('profile', function($row){
                if (!is_null($row->profileNarasumber)) {
                    $btn = '<button class="btn btn-xs btn-info profile-narasumber" id="'. $row->id .'">Lihat Profile</button>';
                } elseif (is_null($row->profileNarasumber)) {
                    $btn = '<button class="btn btn-xs btn-info profile-narasumber" id="'. $row->id .' style="cursor: not-allowed;" disabled>Tidak Ada Profile</button>';
                }

                return $btn;
            })
            ->addColumn('action', function($row){
                if (!is_null($row->profileNarasumber) && $row->profileNarasumber->status == "Belum Terverifikasi") {
                    $btn = '<button class="btn btn-xs btn-info aktifasi-narasumber" id="'. $row->id .'">Aktifasi</button>';
                } elseif (is_null($row->profileNarasumber)) {
                    $btn = '<button class="btn btn-xs btn-info aktifasi-narasumber" id="'. $row->id .' style="cursor: not-allowed;" disabled>Tidak Aktif</button>';
                } else {
                    $btn = '<button class="btn btn-xs btn-info aktifasi-narasumber" id="'. $row->id .' style="cursor: not-allowed;" disabled>Telah Aktif</button>';
                }

                return $btn;
            })
            ->rawColumns(['action','profile', 'nomor'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('dashboard.admin.data-narasumberprofile');

    }

    public function detailDataNarasumberProfile($id)
    {
        $data = NarasumberProfile::where('user_id', $id)->first();

        return $data;

    }

    public function cvDataNarasumberProfile($id)
    {
        $data = NarasumberProfile::find($id);
        $path = storage_path('app/public/' . $data->cv) ;
        
        return response()->file($path);
    }

    public function dataPaketZoom()
    {
        $data = Message::with('user.profile')->get();
        // dd($data);
        if (request()->ajax()) {
            return DataTables()->of($data)
            ->addColumn('nama_lengkap', function($name){
                return $name->user->name;
            })
            ->addColumn('email', function($name){
                return $name->user->email;
            })
            ->addColumn('nomor_whatsapp', function($name){
                return $name->user->profile->no_hp;
            })
            ->addColumn('action', function($action){
                if ($action->status == "Pesan Terkirim") {
                    $btn = '<button class="btn btn-xs btn-info zoom-confirm" id="'. $action->id .'">Konfirmasi</button>';
                } elseif ($action->status == "Terkonfirmasi") {
                    $btn = '<button class="btn btn-xs btn-info" style="cursor: not-allowed;" disabled>Telah Terkonfirmasi</button>';
                }
                return $btn;
            })
            ->rawColumns(['nama_lengkap','email','nomor_whatsapp','action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('dashboard.admin.data-paket-zoom');
    }

    public function prosesDataPaketZoom($id)
    {
        $message = Message::find($id);
        $data = [
            'status' => 'Terkonfirmasi'
        ];
        $message->update($data);

        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function waProsesInvoice($dataWa)
    {
        $message = '
            Halo Bapak / Ibu '. $dataWa['nama_lengkap'] . '

Bukti Pembayaran Anda Telah Terverifikasi Oleh Kami, Dan Menyatakan Bahwa Bukti Pembayaran Anda Valid!

Sekarang Akun Anda Telah Aktif dan Dapat Digunakan Untuk Berkonsultasi Dengan Para Pakar Pengadaan

Have a nice day :)
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
