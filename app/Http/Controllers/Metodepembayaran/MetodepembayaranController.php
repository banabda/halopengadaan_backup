<?php

namespace App\Http\Controllers\Metodepembayaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Metodepembayaran;
use Illuminate\Support\Facades\DB;

class MetodepembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Metodepembayaran::all();

        return view('metodepembayaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('metodepembayaran.index');
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
        DB::table('metodepembayaran')->insert([
            'nama_method'      => $request->nama_method,
            'nama_provider'    => $request->nama_provider,
            'nama_rekening'    => $request->nama_rekening,
            'nomor_rekening'   => $request->nomor_rekening
        ]);
        // alihkan halaman ke halaman metodepembayaran
        return redirect()->route('metodepembayaran');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailmethod($id)
    {
        $metodepembayaran = DB::table('metodepembayaran')->where('id',$id)->get();


        // passing data metodepembayaran yang didapat ke view edit.blade.php
        return view('metodepembayaran.detailmethod',['metodepembayaran' => $metodepembayaran]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editmethod($id)
    {
        $metodepembayaran = DB::table('metodepembayaran')->where('id',$id)->get();


        // passing data metodepembayaranyang didapat ke view edit.blade.php
        return view('metodepembayaran.editmethod',['metodepembayaran' => $metodepembayaran]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatemethod(Request $request)
    {
        DB::table('metodepembayaran')->where('id',$request->id)->update([
            'nama_method'      => $request->nama_method,
            'nama_provider'    => $request->nama_provider,
            'nama_rekening'    => $request->nama_rekening,
            'nomor_rekening'   => $request->nomor_rekening
        ]);
        // alihkan halaman ke halaman methodpembayaran
       return redirect()->route('metodepembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletemethod($id)
    {
        $data = Metodepembayaran::where('id',$id)->delete('metodepembayaran');
        return redirect()->back();
    }
}
