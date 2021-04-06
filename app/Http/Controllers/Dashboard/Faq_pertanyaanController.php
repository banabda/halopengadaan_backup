<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;


class Faq_pertanyaanController extends Controller
{
    public function index()
    {
        // $faq = Faq::all();
        // return view('dashboard.admin.faq.index');

        $data = Faq::all();
        if (request()->ajax()) {
            return DataTables()->of($data)

            ->addColumn('action', function($row){
                $btn = '<a class="btn btn-xs btn-info mr-2 edit-artikel" href="'. route('faq.edit', $row->id) .'" id="'. $row->id .'">
                <i class="fa fa-edit"></i> Edit </a>&nbsp;';
                $btn .= '<a class="btn btn-xs btn-danger delete-confirm" id="'. $row->id .'" href="javascript:void(0)">
                <i class="fa fa-trash"></i> Hapus </a>';

                return $btn;
            })
            ->addColumn('jawaban', function($row){

                return $row->jawaban;
            })
            ->rawColumns(['action','jawaban'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('dashboard.admin.faq.index');
    }
    public function create()
    {
        return view('dashboard.admin.faq.create');
    }
    public function store(Request $request)
    {
        $data = [
            'pertanyaan' => $request->pertanyaan,
            'jawaban'    => $request->jawaban,
        ];

        $faq = Faq::create($data);
        return redirect()->route('faq.index');
    }
    public function edit($id)
    {
        $faq = Faq::find($id);

        $data = [
            'data' => $faq
        ];
        return view('dashboard.admin.faq.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $faq = Faq::find($id);
        $data = [
            'pertanyaan' => $request->pertanyaan,
            'jawaban'    => $request->jawaban,
        ];
        $faq->update($data);

        return redirect()->route('faq.index');
    }
    public function destroy($id)
    {
        $data = Faq::find($id);
        $data->delete();
        return response()->json([
            'status' => 'ok'
        ]);

    }

}
