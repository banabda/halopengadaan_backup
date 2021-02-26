<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
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
                    $btn = '<button class="btn btn-xs btn-info invoice-confirm" style="cursor: not-allowed;" disabled>Telah Terkonfirmasi</button>';
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
        $profile = Profile::where('user_id', $data->user_id)->first();
        $userHasPaket = UserhasPaket::where('user_id', $data->user_id)->first();

        $expired_at =  '';
        if ($data->paket == "1") {
            $expired_at = Carbon::now()->addDays(30)->toDateTimeString();
        } elseif ($data->paket == "2") {
            $expired_at = Carbon::now()->addDays(60)->toDateTimeString();
        } elseif($data->paket == "3") {
            $expired_at = Carbon::now()->addHours(1)->toDateTimeString();
        }

        $data->update([
            'status' => 'Terkonfirmasi'
        ]);

        if (is_null($userHasPaket)) {
            $userPaket = UserhasPaket::create([
                'user_id' => $data->user_id,
                'paket' => $data->paket,
                'expired_at' => $expired_at,
                'status' => 'Aktif'
            ]);
        } else {
            $userHasPaket->update([
                'expired_at' => $expired_at
            ]);
        }

        $userPaket = UserhasPaket::create([
            'user_id' => $data->user_id,
            'paket' => $data->paket,
            'expired_at' => $expired_at,
            'status' => 'Aktif'
        ]);

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

    public function dataNarasumber()
    {
        $data = User::whereHas(
            'roles', function($role){
                $role->where('name', 'narasumber');
            }
        )->get();

        if (request()->ajax()) {
            return DataTables()->of($data)
            ->addColumn('action', function($row){
                $btn = '<button class="btn btn-xs btn-info invoice-confirm" id="'. $row->id .'">Aktifasi</button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('dashboard.admin.data-narasumber');
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
