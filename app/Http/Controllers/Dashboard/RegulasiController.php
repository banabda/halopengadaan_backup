<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Regulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class RegulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // admin.dashboard.regulasi.dokumen
        $data = Regulasi::all();
        if (request()->ajax()) {
            return DataTables()->of($data)
            ->addColumn('link', function($link){
                return '<a target="_blank" href="'. route('landing.regulasi.dokumen', $link->id) .'">Lihat Dokumen</a>';
            })
            ->addColumn('action', function($row){
                $btn = '<a class="btn btn-xs btn-info mr-2 edit-regulasi" href="'. route('regulasi.edit', $row->id) .'" id="'. $row->id .'">
                <i class="fa fa-edit"></i> Edit </a>';
                $btn .= '<a class="btn btn-xs btn-info delete-confirm" id="'. $row->id .'" href="javascript:void(0)">
                <i class="fa fa-trash"></i> Hapus </a>';

                return $btn;
            })
            ->rawColumns(['action', 'link'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('dashboard.admin.regulasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.regulasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // Upload Dokumen
        $path = 'dokumen/regulasi';
        $dokumenName = $data['dokumen']->getClientOriginalName();
        $request->dokumen->move(public_path($path), $dokumenName);
        $path = $path . '/' . $dokumenName;

        $data['dokumen'] = $path;

        $regulasi = Regulasi::create($data);

        return redirect()->route('regulasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regulasi = Regulasi::find($id);

        $data =[
            'regulasi' => $regulasi
        ];

        return view('dashboard.admin.regulasi.edit', $data);
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
        $regulasi = Regulasi::find($id);

        $data = $request->all();
        // dd(isset($data['dokumen']));
        if (isset($data['dokumen'])) {
            File::delete($regulasi->dokumen);
            $path = 'dokumen/regulasi';
            $dokumenName = $data['dokumen']->getClientOriginalName();
            $request->dokumen->move(public_path($path), $dokumenName);
            $path = $path . '/' . $dokumenName;

            $data['dokumen'] = $path;
        }

        $regulasi->update($data);

        return redirect()->route('regulasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $regulasi = Regulasi::find($id);
        $regulasi->delete();
        File::delete($regulasi->dokumen);

        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function seeDokumen($id)
    {
        $data = Regulasi::find($id);

        $path = public_path($data->dokumen);

        return response()->file($path);
    }

    public function menuRegulasi()
    {
        $regulasi = Regulasi::all();
        // dd($regulasi);
        $data = [
            'regulasi' => $regulasi
        ];

        return view('components.section-regulasi', $data);
    }
}
