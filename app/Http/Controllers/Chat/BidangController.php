<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\NarasumberProfile\KeahlianPendukung;
use App\Models\NarasumberProfile\KeahlianUtama;
use App\Models\User;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Bidang::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bidang  $bidang
     * @return \Illuminate\Http\Response
     */
    public function show(Bidang $bidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bidang  $bidang
     * @return \Illuminate\Http\Response
     */
    public function edit(Bidang $bidang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bidang  $bidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bidang $bidang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bidang  $bidang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bidang $bidang)
    {
        //
    }

    public function keahlian(User $user)
    {
        $bidangs = [];
        $pendukungs = $user->keahlianPendukung;
        $utamas = $user->keahlianUtama;
        foreach ($pendukungs as $value) {
            $ahli = KeahlianPendukung::find($value->id)->bidang;
            array_push($bidangs, $ahli);
        }
        foreach ($utamas as $value) {
            $ahli = KeahlianUtama::find($value->id)->bidang;
            array_push($bidangs, $ahli);
        }
        return $bidangs;
    }
}
