<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\UserhasPaket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeChatController extends Controller
{
    public function index()
    {
        $userhaspaket = UserhasPaket::where('user_id', Auth::user()->id)->first();
        
        if (is_null($userhaspaket)) {
            return redirect()->route('user.dashboard.membership');
        } elseif ($userhaspaket->expired_at <= Carbon::now()) {
            return redirect()->route('user.dashboard.membership');
        } elseif ($userhaspaket->saldo == 0) {
            return redirect()->route('user.dashboard.membership');
        }
        return view('layouts.chat');
    }
}
