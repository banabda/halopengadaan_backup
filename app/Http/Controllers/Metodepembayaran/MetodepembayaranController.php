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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
