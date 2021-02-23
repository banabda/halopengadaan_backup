<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
                $btn = '<a class="btn btn-md btn-info invoice-confirm" id="'. $action->id .'" href="javascript:void(0)">
                        Proses </a>';
                return $btn;
            })
            ->rawColumns(['nama_lengkap', 'email', 'paket_detail', 'total_tagihan', 'tanggal', 'action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('dashboard.admin.data-invoice');
    }
}
