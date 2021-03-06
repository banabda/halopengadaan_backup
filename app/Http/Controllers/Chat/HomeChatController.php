<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Message;
use App\Models\User;
use App\Models\UserhasPaket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeChatController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if ($user->hasRole('user')) {
            $userhaspaket = UserhasPaket::where('user_id', Auth::user()->id)->first();
            if (is_null($userhaspaket)) {
                return redirect()->route('user.dashboard.membership');
            } elseif ($userhaspaket->expired_at <= Carbon::now()) {
                return redirect()->route('user.dashboard.membership');
            } elseif ($userhaspaket->saldo == 0) {
                if ($userhaspaket->paket == 3) {
                    $invoice = Invoice::where('user_id', Auth::user()->id)->latest()->first();
                    $message = Message::where('invoice_id', $invoice->id)->first();

                    $data = [
                        'userHasPaket' => $userhaspaket,
                        'message' => $message,
                        'invoice' => $invoice
                    ];
                    return view('dashboard.user.konsultasi', $data);
                } else {
                    return redirect()->route('user.dashboard.membership');
                }
            }
            return view('layouts.chat');
        } elseif ($user->hasRole('narasumber')) {
            if (is_null($user->profileNarasumber)) {
                return redirect()->route('narasumber.dashboard.profile');
            } else {
                if($user->profileNarasumber->status == "Belum Terverifikasi") {
                    return redirect()->route('narasumber.dashboard.profile');
                }
                else {
                    return view('layouts.chat');
                }
            }
        } else {
            return view('layouts.chat');
        }
    }

    public function getSaldo($user_id)
    {
        $saldo = UserhasPaket::where('user_id', $user_id)->first();
        return response()->json($saldo);
    }
}
