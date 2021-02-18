<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        if (request()->ajax()) {
            return DataTables()->of($data)
            ->addColumn('action', function($row){
                $btn = '<a class="btn btn-md btn-info mr-2" href="'. route("user.edit", $row->id) .'">
                <i class="fa fa-edit"></i> Edit </a>';
                $btn .= '<a class="btn btn-md btn-info delete-confirm" id="'. $row->id .'" href="javascript:void(0)">
                <i class="fa fa-trash"></i> Hapus </a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('dashboard.Authentication.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Role::all();
        return view('dashboard.Authentication.users.create', compact('data'));
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
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $user->assignRole($request->input('role'));
        return redirect()->route('user.index')->with('success', 'User Created Successfully');

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
        $data = User::find($id);
        $role = Role::all();
        $userRole = $data->roles->pluck('name','name')->first();
        return view('dashboard.Authentication.users.edit', compact('data','role','userRole'));
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
        $user = User::find($id);
        $data['password'] = Hash::make($data['password']);
        $user->update($data);

        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('role'));
        return redirect()->route('user.index')->with('success','User Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'status'    => "ok",
            'route' => route('role.index')
        ], 200);
    }
}
