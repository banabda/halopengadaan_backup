<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::all();
        if (request()->ajax()) {
            return DataTables()->of($data)
            ->addColumn('action', function($row){
                $btn = '<a class="btn btn-md btn-info mr-2" href="'. route("role.edit", $row->id) .'">
                <i class="fa fa-edit"></i> Edit </a>';
                $btn .= '<a class="btn btn-md btn-info delete-confirm" id="'. $row->id .'" href="javascript:void(0)">
                <i class="fa fa-trash"></i> Hapus </a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('dashboard.Authentication.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.Authentication.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'guard_name' => 'required'
        ]);

        $data = $request->all();
        $role = Role::firstOrCreate($data);

        return redirect()->route('role.index')->with('success', 'Role Created Successfully');
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
        $data = Role::find($id);
        return view('dashboard.Authentication.role.edit', compact('data'));
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
        $data = $request->all();
        $role = Role::find($id);
        $role->update($data);

        return redirect()->route('role.index')->with('success', 'Role Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return response()->json([
            'status'    => "ok",
            'route' => route('role.index')
        ], 200);
    }
}
