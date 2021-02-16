<?php

namespace App\Http\Controllers\DashboardNarasumber;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NarasumberController extends Controller
{
    public function register()
    {
        return view('narasumber.register');
    }

    public function saveRegister(Request $request)
    {
        $data = $request->all();

        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::createOrFirst([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $user->assignRole('narasumber');
        dd($data);
    }
}
