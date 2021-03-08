<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artikel::all();
        if (request()->ajax()) {
            return DataTables()->of($data)
            ->addColumn('link_url', function($url){
                return '<a target="_blank" href="'. $url->link .'">Link Artikel</a>';
            })
            ->addColumn('foto_artikel', function($foto){
                return "<a target='_blank' href='". Storage::url($foto->foto) ."'><img src=". Storage::url($foto->foto). " height='150px' width='auto' alt='". $foto->foto ."'></a>";
            })
            ->addColumn('action', function($row){
                $btn = '<a class="btn btn-xs btn-info mr-2 edit-artikel" href="'. route('artikel.edit', $row->id) .'" id="'. $row->id .'">
                <i class="fa fa-edit"></i> Edit </a>';
                $btn .= '<a class="btn btn-xs btn-info delete-confirm" id="'. $row->id .'" href="javascript:void(0)">
                <i class="fa fa-trash"></i> Hapus </a>';

                return $btn;
            })
            ->rawColumns(['action', 'link_url', 'foto_artikel'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('dashboard.admin.artikel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.artikel.create');
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
        $path = 'images/artikel';
        $file = $request->file('foto');
        $path = Storage::disk('public')->put(
            $path,
            $file
        );

        $data['foto'] = $path;
        $artikel = Artikel::create($data);

        return redirect()->route('artikel.index');
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
        $data = Artikel::find($id)->first();
        return view('dashboard.admin.artikel.edit', compact('data'));
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
        $artikel = Artikel::find($id);
        $data = $request->all();

        // Delete Foto Artikel
        if (is_null($data['foto'])) {
            unlink(storage_path('app/public/'.$artikel->foto));

            // Re - Upload Foto Artikel
            $path = 'images/artikel';
            $file = $request->file('foto');
            $path = Storage::disk('public')->put(
                $path,
                $file
            );

            $data['foto'] = $path;
        }

        $artikel->update($data);

        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Artikel::find($id);
        $data->delete();
        unlink(storage_path('app/public/'.$artikel->foto));

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
