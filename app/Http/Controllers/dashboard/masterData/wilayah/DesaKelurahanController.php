<?php

namespace App\Http\Controllers\dashboard\masterData\wilayah;

use App\Http\Controllers\Controller;
use App\Models\DesaKelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DesaKelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DesaKelurahan::orderBy('created_at', 'asc')->where('kecamatan_id', $request->kecamatan)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id="btn-edit" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" ><i class="fas fa-edit"></i> Ubah</button><button id="btn-delete" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $kecamatan = Kecamatan::find($request->kecamatan);
        return view('dashboard.pages.masterData.wilayah.desaKelurahan.index', compact('kecamatan'));
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
                'nama' => ['required', Rule::unique('desa_kelurahan')->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama Desa/Kelurahan tidak boleh kosong',
                'nama.unique' => 'Nama Desa/Kelurahan sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $desaKelurahan = new DesaKelurahan();
        $desaKelurahan->nama = $request->nama;
        $desaKelurahan->kecamatan_id = $request->kecamatan;
        $desaKelurahan->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DesaKelurahan  $desaKelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(DesaKelurahan $desaKelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DesaKelurahan  $desaKelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $desaKelurahan = DesaKelurahan::find($request->id);
        return response()->json($desaKelurahan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DesaKelurahan  $desaKelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('desa_kelurahan')->where('kecamatan_id', $request->kecamatan)->ignore($request->kelurahan)->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama Desa/Kelurahan tidak boleh kosong',
                'nama.unique' => 'Nama Desa/Kelurahan sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $desaKelurahan = DesaKelurahan::find($request->kelurahan);
        $desaKelurahan->nama = $request->nama;
        $desaKelurahan->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DesaKelurahan  $desaKelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $desaKelurahan = DesaKelurahan::find($request->kelurahan);
        $desaKelurahan->delete();

        return response()->json(['status' => 'success']);
    }
}
