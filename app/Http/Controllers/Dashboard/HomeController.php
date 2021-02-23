<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

        $data->update([
            'status' => 'Terkonfirmasi'
        ]);

        return response()->json([
            'status' => "ok"
        ]);

    }
}
