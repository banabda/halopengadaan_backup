<?php

namespace App\Http\Controllers\Mambership;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mambership;
use Illuminate\Support\Facades\DB;


class MambershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mambership::all();

        return view('mambership.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('mambership.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // insert data ke table mambership
        DB::table('mambership')->insert([
            'nama_lengkap'      => $request->nama_lengkap,
            'email'             => $request->email,
            'no_wa'             => $request->no_wa,
            'tempat_kerja'      => $request->tempat_kerja,
            'jenis'             => $request->jenis,
            'status'            => $request->status,
            'mambership'        => $request->mambership
        ]);
        // alihkan halaman ke halaman mambership
        return redirect()->route('mambership');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailmamber($id)
    {
        $mambership = DB::table('mambership')->where('id',$id)->get();


        // passing data mambership yang didapat ke view edit.blade.php
        return view('mambership.detailmamber',['mambership' => $mambership]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editmamber($id)
    {
        $mambership = DB::table('mambership')->where('id',$id)->get();


        // passing data mam$mambershipyang didapat ke view edit.blade.php
        return view('mambership.editmamber',['mambership' => $mambership]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatemamber(Request $request)
    {
        DB::table('mambership')->where('id',$request->id)->update([
            'nama_lengkap'      => $request->nama_lengkap,
            'email'             => $request->email,
            'no_wa'             => $request->no_wa,
            'tempat_kerja'      => $request->tempat_kerja,
            'jenis'             => $request->jenis,
            'status'            => $request->status,
            'mambership'        => $request->mambership
        ]);
        // alihkan halaman ke halaman mambership
       return redirect()->route('mambership');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletemamber($id)
    {
        $data = Mambership::where('id',$id)->delete('mambership');
        return redirect()->back();
    }
}
