<?php

namespace App\Http\Controllers\dashboard\masterData\akun;

use App\Http\Controllers\Controller;
use App\Models\Opd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->role == 'Admin') {
            if ($request->ajax()) {
                $data = User::orderBy('id', 'desc')->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('email', function ($row) {
                        return $row->email;
                    })
                    ->addColumn('role', function ($row) {
                        return $row->role;
                    })
                    ->addColumn('opd', function ($row) {
                        if ($row->role == 'Admin') {
                            return '-';
                        } else {
                            return $row->opd->nama;
                        }
                    })
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<button id="btn-delete" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action', 'opd'])
                    ->make(true);
            }
            return view('dashboard.pages.masterData.akun.index');
        } else {
            return abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'Admin') {
            $opd = Opd::orderBy('nama', 'asc')->get();
            return view('dashboard.pages.masterData.akun.create', compact(['opd']));
        } else {
            return abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'email|required|unique:users',
                'password' => 'required|min:6',
                'role' => 'required',
                'opd' => 'required',
            ],
            [
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah digunakan',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 6 karakter',
                'role.required' => 'Role tidak boleh kosong',
                'opd.required' => 'OPD tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->opd_id = $request->opd;
        $user->save();


        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
