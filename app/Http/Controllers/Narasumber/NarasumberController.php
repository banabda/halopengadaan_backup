<?php

namespace App\Http\Controllers\Narasumber;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\narasumber;
use Illuminate\Support\Facades\DB;
class NarasumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = Narasumber::all();

        return view('narasumber.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('narasumber.index');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

         // insert data ke table metode pembayaran
         DB::table('narasumber')->insert([
            'nama'      => ucwords($request->nama),
            'email'     => $request->email,
            'password'  => $request->password,
            'alamat'    => ucwords($request->alamat),
            'nomor_hp'  => $request->nomor_hp

        ]);
        // alihkan halaman ke halaman narasumber
        return redirect()->route('narasumber');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
       $narasumber = DB::table('narasumber')->where('id',$id)->get();


        // passing data pegawai yang didapat ke view edit.blade.php
        return view('narasumber.detail', compact('narasumber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $narasumber = DB::table('narasumber')->where('id',$id)->get();


        // passing data pegawai yang didapat ke view edit.blade.php
        return view('narasumber.edit',['narasumber' => $narasumber]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         DB::table('narasumber')->where('id',$request->id)->update([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'password'  => $request->password,
            'alamat'    => $request->alamat,
            'nomor_hp'  => $request->nomor_hp

    ]);
    return redirect()->route('narasumber');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Narasumber::where('id',$id)->delete('narasumber');
        return redirect()->back();
    }
}
