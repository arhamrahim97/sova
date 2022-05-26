<?php

namespace App\Http\Controllers\dashboard\masterData\opd;

use App\Http\Controllers\Controller;
use App\Models\Opd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OpdController extends Controller
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
                $data = Opd::orderBy('created_at', 'asc')->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<button id="btn-edit" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" ><i class="fas fa-edit"></i> Ubah</button><button id="btn-delete" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('dashboard.pages.masterData.opd.index');
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
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('opd')->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama OPD tidak boleh kosong',
                'nama.unique' => 'Nama OPD sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $opd = new Opd();
        $opd->nama = $request->nama;
        $opd->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function show(Opd $opd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function edit(Opd $opd)
    {
        return response()->json($opd);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opd $opd)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('opd')->ignore($opd->id)->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama OPD tidak boleh kosong',
                'nama.unique' => 'Nama OPD sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $opd->nama = $request->nama;
        $opd->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opd  $opd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opd $opd)
    {
        $opd->delete();
        return response()->json(['status' => 'success']);
    }
}
