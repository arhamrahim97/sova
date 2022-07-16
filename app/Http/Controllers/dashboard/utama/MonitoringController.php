<?php

namespace App\Http\Controllers\dashboard\utama;

use App\Http\Controllers\Controller;
use App\Models\DesaKelurahan;
use App\Models\DokumenMonitoring;
use App\Models\Indikator;
use App\Models\Monitoring;
use App\Models\Opd;
use App\Models\RiwayatMonitoring;
use App\Models\WilayahMonitoring;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tahunSekarang = Carbon::now()->year;
        // $bulanSekarang = Carbon::now()->month;

        $bulanSekarang = 1;

        if ($request->ajax()) {
            $data = Monitoring::with('riwayatMonitoring')->orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('indikator', function ($row) {
                    return $row->indikator->nama;
                })
                ->addColumn('opd', function ($row) {
                    return $row->opd->nama;
                })
                ->addColumn('tw1', function ($row) use ($tahunSekarang, $bulanSekarang) {
                    $riwayatMonitoring = RiwayatMonitoring::where('monitoring_id', $row->id)->where('tw', 1)->first();
                    if ($riwayatMonitoring) {
                        $badge = '<span class="my-0">' . round($riwayatMonitoring->persentase, 2) . ' %' . '</span><br><span class="badge badge-primary">' . $riwayatMonitoring->total_wilayah_monitoring . ' dari ' . $riwayatMonitoring->total_seluruh_desa . ' desa</span>';
                        if ($riwayatMonitoring->is_valid == 0) {
                            $badge .= '<br><span class="my-0 badge badge-warning">Belum Divalidasi</span>';
                            if (Auth::user()->role == "Admin") {
                                $badge .= '<br><a href="' . url('/monitoring/' . $riwayatMonitoring->id) . '" class="my-0 badge badge-primary"><i class="far fa-check-circle"></i> Validasi</a>';
                            }
                            $badge .= '<br><button id="btn-delete" class="btn-delete badge badge-danger" value="' . $riwayatMonitoring->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                        } else {
                            if ($riwayatMonitoring->is_valid == 1) {
                                $badge .= '<br><span class="my-0 badge badge-success">Divalidasi</span>';
                                $badge .= '<br><a href="' . url('/monitoring/' . $riwayatMonitoring->id) . '" class="my-0 badge badge-primary"><i class="fas fa-eye"></i> Lihat</a>';
                                if (Auth::user()->role == "Admin") {
                                    $badge .= '<br><button id="btn-delete" class="btn-delete badge badge-danger" value="' . $riwayatMonitoring->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                                }
                            } else {
                                $badge .= '<br><span class="my-0 badge badge-danger">Ditolak</span>';
                                if ($riwayatMonitoring->monitoring->users_id == Auth::user()->id) {
                                    $badge .= '<br><a href="' . url('/monitoring/' . $riwayatMonitoring->id . '/edit') . '" class="my-0 badge badge-primary"><i class="far fa-edit"></i> Perbaiki</a>';
                                }
                            }
                        }
                        return $badge;
                    } else {
                        $badge = '<span class="badge badge-primary">Tidak Ada</span>';
                        // if ((Carbon::parse($row->created_at)->year == $tahunSekarang) && ($bulanSekarang >= 1 && $bulanSekarang <= 3)) {
                        $badge .= '<form action="' . url('monitoring/create/') . '" method="POST" enctype="multipart/form-data">' . csrf_field() . '<input type="hidden" value="' . $row->id . '" name="monitoring_id"><button class="btn btn-primary text-light btn-sm mt-1" type="submit"><i class="fas fa-file-pdf"></i> Upload</button></form>';
                        // }
                        return $badge;
                    }
                })
                ->addColumn('tw2', function ($row) use ($tahunSekarang, $bulanSekarang) {
                    $riwayatMonitoring = RiwayatMonitoring::where('monitoring_id', $row->id)->where('tw', 2)->first();
                    if ($riwayatMonitoring) {
                        $badge = '<span class="my-0">' . round($riwayatMonitoring->persentase, 2) . ' %' . '</span><br><span class="badge badge-primary">' . $riwayatMonitoring->total_wilayah_monitoring . ' dari ' . $riwayatMonitoring->total_seluruh_desa . ' desa</span>';
                        if ($riwayatMonitoring->is_valid == 0) {
                            $badge .= '<br><span class="my-0 badge badge-warning">Belum Divalidasi</span>';
                            if (Auth::user()->role == "Admin") {
                                $badge .= '<br><a href="' . url('/monitoring/' . $riwayatMonitoring->id) . '" class="my-0 badge badge-primary"><i class="far fa-check-circle"></i> Validasi</a>';
                            }
                            $badge .= '<br><button id="btn-delete" class="btn-delete badge badge-danger" value="' . $riwayatMonitoring->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                        } else {
                            if ($riwayatMonitoring->is_valid == 1) {
                                $badge .= '<br><span class="my-0 badge badge-success">Divalidasi</span>';
                                $badge .= '<br><a href="' . url('/monitoring/' . $riwayatMonitoring->id) . '" class="my-0 badge badge-primary"><i class="fas fa-eye"></i> Lihat</a>';
                                if (Auth::user()->role == "Admin") {
                                    $badge .= '<br><button id="btn-delete" class="btn-delete badge badge-danger" value="' . $riwayatMonitoring->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                                }
                            } else {
                                $badge .= '<br><span class="my-0 badge badge-danger">Ditolak</span>';
                                if ($riwayatMonitoring->monitoring->users_id == Auth::user()->id) {
                                    $badge .= '<br><a href="' . url('/monitoring/' . $riwayatMonitoring->id . '/edit') . '" class="my-0 badge badge-primary"><i class="far fa-edit"></i> Perbaiki</a>';
                                }
                            }
                        }
                        return $badge;
                    } else {
                        $badge = '<span class="badge badge-primary">Tidak Ada</span>';
                        // if ((Carbon::parse($row->created_at)->year == $tahunSekarang) && ($bulanSekarang >= 4 && $bulanSekarang <= 6)) {
                        $badge .= '<form action="' . url('monitoring/create/') . '" method="POST" enctype="multipart/form-data">' . csrf_field() . '<input type="hidden" value="' . $row->id . '" name="monitoring_id"><input type="hidden" value="2" name="tw"><button class="btn-upload badge badge-primary text-light btn-sm mt-1" type="submit"><i class="fas fa-file-pdf"></i> Upload</button></form>';
                        // }
                        return $badge;
                    }
                })
                ->addColumn('tw3', function ($row) use ($tahunSekarang, $bulanSekarang) {
                    $riwayatMonitoring = RiwayatMonitoring::where('monitoring_id', $row->id)->where('tw', 3)->first();
                    if ($riwayatMonitoring) {
                        $badge = '<span class="my-0">' . round($riwayatMonitoring->persentase, 2) . ' %' . '</span><br><span class="badge badge-primary">' . $riwayatMonitoring->total_wilayah_monitoring . ' dari ' . $riwayatMonitoring->total_seluruh_desa . ' desa</span>';
                        if ($riwayatMonitoring->is_valid == 0) {
                            $badge .= '<br><span class="my-0 badge badge-warning">Belum Divalidasi</span>';
                            if (Auth::user()->role == "Admin") {
                                $badge .= '<br><a href="' . url('/monitoring/' . $riwayatMonitoring->id) . '" class="my-0 badge badge-primary"><i class="far fa-check-circle"></i> Validasi</a>';
                            }
                            $badge .= '<br><button id="btn-delete" class="btn-delete badge badge-danger" value="' . $riwayatMonitoring->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                        } else {
                            if ($riwayatMonitoring->is_valid == 1) {
                                $badge .= '<br><span class="my-0 badge badge-success">Divalidasi</span>';
                                $badge .= '<br><a href="' . url('/monitoring/' . $riwayatMonitoring->id) . '" class="my-0 badge badge-primary"><i class="fas fa-eye"></i> Lihat</a>';
                                if (Auth::user()->role == "Admin") {
                                    $badge .= '<br><button id="btn-delete" class="btn-delete badge badge-danger" value="' . $riwayatMonitoring->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                                }
                            } else {
                                $badge .= '<br><span class="my-0 badge badge-danger">Ditolak</span>';
                                if ($riwayatMonitoring->monitoring->users_id == Auth::user()->id) {
                                    $badge .= '<br><a href="' . url('/monitoring/' . $riwayatMonitoring->id . '/edit') . '" class="my-0 badge badge-primary"><i class="far fa-edit"></i> Perbaiki</a>';
                                }
                            }
                        }
                        return $badge;
                    } else {
                        $badge = '<span class="badge badge-primary">Tidak Ada</span>';
                        // if ((Carbon::parse($row->created_at)->year == $tahunSekarang) && ($bulanSekarang >= 7 && $bulanSekarang <= 9)) {
                        $badge .= '<form action="' . url('monitoring/create/') . '" method="POST" enctype="multipart/form-data">' . csrf_field() . '<input type="hidden" value="' . $row->id . '" name="monitoring_id"><input type="hidden" value="3" name="tw"><button class="btn-upload badge badge-primary text-light btn-sm mt-1" type="submit"><i class="fas fa-file-pdf"></i> Upload</button></form>';
                        // }
                        return $badge;
                    }
                })
                ->addColumn('tw4', function ($row) use ($tahunSekarang, $bulanSekarang) {
                    $riwayatMonitoring = RiwayatMonitoring::where('monitoring_id', $row->id)->where('tw', 4)->first();
                    if ($riwayatMonitoring) {
                        $badge = '<span class="my-0">' . round($riwayatMonitoring->persentase, 2) . ' %' . '</span><br><span class="badge badge-primary">' . $riwayatMonitoring->total_wilayah_monitoring . ' dari ' . $riwayatMonitoring->total_seluruh_desa . ' desa</span>';
                        if ($riwayatMonitoring->is_valid == 0) {
                            $badge .= '<br><span class="my-0 badge badge-warning">Belum Divalidasi</span>';
                            if (Auth::user()->role == "Admin") {
                                $badge .= '<br><a href="' . url('/monitoring/' . $riwayatMonitoring->id) . '" class="my-0 badge badge-primary"><i class="far fa-check-circle"></i> Validasi</a>';
                            }
                            $badge .= '<br><button id="btn-delete" class="btn-delete badge badge-danger" value="' . $riwayatMonitoring->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                        } else {
                            if ($riwayatMonitoring->is_valid == 1) {
                                $badge .= '<br><span class="my-0 badge badge-success">Divalidasi</span>';
                                $badge .= '<br><a href="' . url('/monitoring/' . $riwayatMonitoring->id) . '" class="my-0 badge badge-primary"><i class="fas fa-eye"></i> Lihat</a>';
                                if (Auth::user()->role == "Admin") {
                                    $badge .= '<br><button id="btn-delete" class="btn-delete badge badge-danger" value="' . $riwayatMonitoring->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                                }
                            } else {
                                $badge .= '<br><span class="my-0 badge badge-danger">Ditolak</span>';
                                if ($riwayatMonitoring->monitoring->users_id == Auth::user()->id) {
                                    $badge .= '<br><a href="' . url('/monitoring/' . $riwayatMonitoring->id . '/edit') . '" class="my-0 badge badge-primary"><i class="far fa-edit"></i> Perbaiki</a>';
                                }
                            }
                        }
                        return $badge;
                    } else {
                        $badge = '<span class="badge badge-primary">Tidak Ada</span>';
                        // if ((Carbon::parse($row->created_at)->year == $tahunSekarang) && ($bulanSekarang >= 10 && $bulanSekarang <= 12)) {
                        // $badge .= '<span class="badge badge-primary">Upload</span>';
                        $badge .= '<form action="' . url('monitoring/create/') . '" method="POST" enctype="multipart/form-data">' . csrf_field() . '<input type="hidden" value="' . $row->id . '" name="monitoring_id"><input type="hidden" value="4" name="tw"><button class="btn-upload badge badge-primary text-light btn-sm mt-1" type="submit"><i class="fas fa-file-pdf"></i> Upload</button></form>';
                        // }
                        return $badge;
                    }
                })
                ->addColumn('status_verifikasi', function ($row) {
                    return 'Status Verifikasi';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id="btn-delete-monitoring" class="btn-delete btn btn-danger btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'indikator', 'opd', 'tw1', 'tw2', 'tw3', 'tw4', 'status_verifikasi'])
                ->make(true);
        }
        return view('dashboard.pages.utama.monitoring.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tw = $request->tw;
        if ($request->isMethod('POST')) {
            // $riwayatMonitoring = RiwayatMonitoring::where('monitoring_id', $request->monitoring_id)->first();
            $monitoring = Monitoring::find($request->monitoring_id);
            $desaKelurahan = DesaKelurahan::orderBy('nama', 'asc')->get();
            return view('dashboard.pages.utama.monitoring.createPost', compact('monitoring', 'desaKelurahan', 'tw'));
        } else {
            $opd = Opd::orderBy('nama', 'asc')->get();
            $indikator = Indikator::orderBy('nama', 'asc')->get();
            $desaKelurahan = DesaKelurahan::orderBy('nama', 'asc')->get();
            return view('dashboard.pages.utama.monitoring.create', compact('opd', 'indikator', 'desaKelurahan'));
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
        if ($request->has('monitoring_id') || Auth::user()->role != "Admin") {
            $opd = 'nullable';
        } else {
            $opd = 'required';
        }
        $validator = Validator::make(
            $request->all(),
            [
                'nama_file' => 'required',
                'nama_file.*' => 'required',
                'file_dokumen.*' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:5120',
                'wilayah' => 'required',
                'deskripsi' => 'required',
                'indikator' => !$request->monitoring_id ? 'required' : 'nullable',
                'opd' => $opd,
            ],
            [
                'nama_file.required' => 'Nama file tidak boleh kosong',
                'nama_file.*.required' => 'Nama file tidak boleh kosong',
                'file_dokumen.*.mimes' => "Dokumen Harus Berupa File PDF",
                'file_dokumen.*.max' => "Dokumen Tidak Boleh Lebih Dari 5 Mb",
                'wilayah.required' => 'Wilayah Tidak Boleh Kosong',
                'deskripsi.required' => 'Deskripsi Tidak Boleh Kosong',
                'indikator.required' => 'Indikator Tidak Boleh Kosong',
                'opd.required' => 'OPD Tidak Boleh Kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if (!$request->monitoring_id) {
            $monitoring = new Monitoring();
            $monitoring->indikator_id = $request->indikator;
            $monitoring->opd_id = Auth::user()->role == "Admin" ? $request->opd : Auth::user()->opd_id;
            $monitoring->users_id = Auth::user()->id;
            $monitoring->save();
        } else {
            $monitoring = Monitoring::find($request->monitoring_id);
        }



        $tw = $request->tw ?? 1; //ganti nanti

        $totalSeluruhDesa = DesaKelurahan::count();


        $riwayatMonitoring = new RiwayatMonitoring();
        $riwayatMonitoring->monitoring_id = $monitoring->id;
        $riwayatMonitoring->deskripsi = $request->deskripsi;
        $riwayatMonitoring->tw = $tw;
        if (!$request->monitoring_id) {
            $totalWilayahMonitoring = count($request->wilayah);
            $persentase = ($totalWilayahMonitoring / $totalSeluruhDesa) * 100;
            $riwayatMonitoring->persentase = $persentase;
            $riwayatMonitoring->total_wilayah_monitoring = $totalWilayahMonitoring;
        } else {
            if ($tw == 2) {
                $tw1 = RiwayatMonitoring::where('monitoring_id', $request->monitoring_id)->where('tw', 1)->first()->total_wilayah_monitoring ?? 0;
                $totalWilayahMonitoring = (count($request->wilayah) + $tw1);
                $persentase = ($totalWilayahMonitoring / $totalSeluruhDesa) * 100;
                $riwayatMonitoring->total_wilayah_monitoring =  $totalWilayahMonitoring;
                $riwayatMonitoring->persentase = $persentase;
            } else if ($tw == 3) {
                $tw1 = RiwayatMonitoring::where('monitoring_id', $request->monitoring_id)->where('tw', 1)->first()->total_wilayah_monitoring ?? 0;
                $tw2 = RiwayatMonitoring::where('monitoring_id', $request->monitoring_id)->where('tw', 2)->first()->total_wilayah_monitoring ?? 0;
                $totalWilayahMonitoring = (count($request->wilayah) + $tw2);
                $persentase = ($totalWilayahMonitoring / $totalSeluruhDesa) * 100;
                $riwayatMonitoring->total_wilayah_monitoring =  $totalWilayahMonitoring;
                $riwayatMonitoring->persentase = $persentase;
            } else if ($tw == 4) {
                $tw1 = RiwayatMonitoring::where('monitoring_id', $request->monitoring_id)->where('tw', 1)->first()->total_wilayah_monitoring ?? 0;
                $tw2 = RiwayatMonitoring::where('monitoring_id', $request->monitoring_id)->where('tw', 2)->first()->total_wilayah_monitoring ?? 0;
                $tw3 = RiwayatMonitoring::where('monitoring_id', $request->monitoring_id)->where('tw', 3)->first()->total_wilayah_monitoring ?? 0;
                $totalWilayahMonitoring = (count($request->wilayah) + $tw3);
                $persentase = ($totalWilayahMonitoring / $totalSeluruhDesa) * 100;
                $riwayatMonitoring->total_wilayah_monitoring =  $totalWilayahMonitoring;
                $riwayatMonitoring->persentase = $persentase;
            }
            $riwayatMonitoring->persentase = $persentase;
        }
        $riwayatMonitoring->total_seluruh_desa = $totalSeluruhDesa;
        if (Auth::user()->role == "Admin") {
            $riwayatMonitoring->is_valid = 1;
            $riwayatMonitoring->tanggal_verifikasi = Carbon::now();
        }
        $riwayatMonitoring->save();

        for ($i = 0; $i < count($request->wilayah); $i++) {
            $wilayahMonitoring = new WilayahMonitoring();
            $wilayahMonitoring->monitoring_id = $monitoring->id;
            $wilayahMonitoring->desa_kelurahan_id = $request->wilayah[$i];
            $wilayahMonitoring->tw = $tw;
            $wilayahMonitoring->save();
        }

        $lengthBerkas = count($request->nama_file);
        for ($i = 0; $i < $lengthBerkas; $i++) {
            $namaFileBerkas = Str::slug($request->nama_file[$i], '-') . "-" . $i . Carbon::now()->format('YmdHs') . rand(1, 9999) . '.' .
                $request->file('file_dokumen')[$i]->getClientOriginalExtension();
            $request->file('file_dokumen')[$i]->storeAs(
                'monitoring',
                $namaFileBerkas
            );

            $dokumenMonitoring = new DokumenMonitoring();
            $dokumenMonitoring->nama_dokumen = $request->nama_file[$i];
            $dokumenMonitoring->dokumen = $namaFileBerkas;
            $dokumenMonitoring->riwayat_monitoring_id = $riwayatMonitoring->id;
            $dokumenMonitoring->save();
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayatMonitoring = RiwayatMonitoring::with('dokumen')->find($id);
        $monitoring = $riwayatMonitoring->monitoring;
        $wilayahMonitoring = WilayahMonitoring::where('monitoring_id', $monitoring->id)->where('tw', $riwayatMonitoring->tw)->get();
        return view('dashboard.pages.utama.monitoring.show', compact('riwayatMonitoring', 'monitoring', 'wilayahMonitoring'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $riwayatMonitoring = RiwayatMonitoring::with('dokumen')->find($id);
        $monitoring = $riwayatMonitoring->monitoring;
        $desaKelurahan = DesaKelurahan::orderBy('nama', 'asc')->get();
        $wilayahMonitoringId = WilayahMonitoring::where('monitoring_id', $monitoring->id)->where('tw', $riwayatMonitoring->tw)->get()->pluck('id');
        return view('dashboard.pages.utama.monitoring.edit', compact(['riwayatMonitoring', 'monitoring', 'desaKelurahan', 'wilayahMonitoringId']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_file' => $request->nama_file ? 'required' : 'nullable',
                'nama_file.*' => $request->nama_file ? 'required' : 'nullable',
                'nama_file_update' => 'required',
                'nama_file_update.*' => 'required',
                'file_dokumen.*' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:5120',
                'file_dokumen_update.*' => 'mimes:jpeg,bmp,png,gif,svg,pdf|max:5120',
                'wilayah' => 'required',
            ],
            [
                'nama_file.required' => 'Nama file tidak boleh kosong',
                'nama_file.*.required' => 'Nama file tidak boleh kosong',
                'nama_file_update.required' => 'Nama file tidak boleh kosong',
                'nama_file_update.*.required' => 'Nama file tidak boleh kosong',
                'file_dokumen.*.mimes' => "Dokumen Harus Berupa File PDF",
                'file_dokumen.*.max' => "Dokumen Tidak Boleh Lebih Dari 5 Mb",
                'file_dokumen_update.*.mimes' => "Dokumen Harus Berupa File PDF",
                'file_dokumen_update.*.max' => "Dokumen Tidak Boleh Lebih Dari 5 Mb",
                'wilayah.required' => 'Wilayah tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $totalSeluruhDesa = DesaKelurahan::count();

        $riwayatMonitoring = RiwayatMonitoring::find($id);

        $arrayDokumenUpdate = json_decode($request->arrayDokumenUpdate);
        $arrayNamaFileUpdate = json_decode($request->arrayNamaFileUpdate);
        $arrayDokumenHapus = json_decode($request->arrayDokumenHapus);
        // return response()->json($arrayDokumenUpdate);

        if ($arrayDokumenHapus) {
            for ($i = 0; $i < count($arrayDokumenHapus); $i++) {
                $dokumen = DokumenMonitoring::find($arrayDokumenHapus[$i]);
                if (Storage::exists('monitoring/' . $dokumen->dokumen)) {
                    Storage::delete('monitoring/' . $dokumen->dokumen);
                }
                $dokumen->delete();
            }
        }

        if ($arrayNamaFileUpdate) {
            for ($i = 0; $i < count($arrayNamaFileUpdate); $i++) {
                $dokumen = DokumenMonitoring::find($arrayNamaFileUpdate[$i]);
                $dokumen->nama_dokumen = $request->nama_file_update[$i];
                $dokumen->save();
            }
        }

        if ($arrayDokumenUpdate) {
            for ($i = 0; $i < count($arrayDokumenUpdate); $i++) {
                $dokumen = DokumenMonitoring::find($arrayDokumenUpdate[$i]);

                if (Storage::exists('monitoring/' . $dokumen->dokumen)) {
                    Storage::delete('monitoring/' . $dokumen->dokumen);
                }
                $namaFileBerkas = Str::slug($request->nama_file[$i], '-') . "-" . $i . Carbon::now()->format('YmdHs') . rand(1, 9999) . '.' .
                    $request->file('file_dokumen')[$i]->getClientOriginalExtension();
                $request->file('file_dokumen_update')[$i]->storeAs(
                    'monitoring',
                    $namaFileBerkas
                );
                $dokumen->dokumen = $namaFileBerkas;
                $dokumen->save();
            }
        }

        if ($request->file('file_dokumen')) {
            for ($i = 0; $i < count($request->file('file_dokumen')); $i++) {
                $namaFileBerkas = Str::slug($request->nama_file[$i], '-') . "-" . $i . Carbon::now()->format('YmdHs') . rand(1, 9999) . '.' .
                    $request->file('file_dokumen')[$i]->getClientOriginalExtension();
                $request->file('file_dokumen')[$i]->storeAs(
                    'monitoring',
                    $namaFileBerkas
                );
                $dokumen = new DokumenMonitoring();
                $dokumen->nama_dokumen = $request->nama_file[$i];
                $dokumen->dokumen = $namaFileBerkas;
                $dokumen->riwayat_monitoring_id = $riwayatMonitoring->id;
                $dokumen->save();
            }
        }

        $tw = $riwayatMonitoring->tw;

        $wilayahMonitoring = WilayahMonitoring::where('monitoring_id', $riwayatMonitoring->monitoring_id)->where('tw', $tw)->delete();
        for ($i = 0; $i < count($request->wilayah); $i++) {
            $wilayahMonitoring = new WilayahMonitoring();
            $wilayahMonitoring->monitoring_id = $riwayatMonitoring->monitoring_id;
            $wilayahMonitoring->desa_kelurahan_id = $request->wilayah[$i];
            $wilayahMonitoring->tw = $tw;
            $wilayahMonitoring->save();
        }

        if ($tw == 1) {
            $totalWilayahMonitoring = count($request->wilayah);
            $persentase = ($totalWilayahMonitoring / $totalSeluruhDesa) * 100;
            $riwayatMonitoring->persentase = $persentase;
            $riwayatMonitoring->total_wilayah_monitoring = $totalWilayahMonitoring;
        } else if ($tw == 2) {
            $tw1 = RiwayatMonitoring::where('monitoring_id', $riwayatMonitoring->monitoring_id)->where('tw', 1)->first()->total_wilayah_monitoring ?? 0;
            $totalWilayahMonitoring = (count($request->wilayah) + $tw1);
            $persentase = ($totalWilayahMonitoring / $totalSeluruhDesa) * 100;
            $riwayatMonitoring->total_wilayah_monitoring =  $totalWilayahMonitoring;
            $riwayatMonitoring->persentase = $persentase;
        } else if ($tw == 3) {
            $tw1 = RiwayatMonitoring::where('monitoring_id', $riwayatMonitoring->monitoring_id)->where('tw', 1)->first()->total_wilayah_monitoring ?? 0;
            $tw2 = RiwayatMonitoring::where('monitoring_id', $riwayatMonitoring->monitoring_id)->where('tw', 2)->first()->total_wilayah_monitoring ?? 0;
            $totalWilayahMonitoring = (count($request->wilayah) + $tw2);
            $persentase = ($totalWilayahMonitoring / $totalSeluruhDesa) * 100;
            $riwayatMonitoring->total_wilayah_monitoring =  $totalWilayahMonitoring;
            $riwayatMonitoring->persentase = $persentase;
        } else if ($tw == 4) {
            $tw1 = RiwayatMonitoring::where('monitoring_id', $riwayatMonitoring->monitoring_id)->where('tw', 1)->first()->total_wilayah_monitoring ?? 0;
            $tw2 = RiwayatMonitoring::where('monitoring_id', $riwayatMonitoring->monitoring_id)->where('tw', 2)->first()->total_wilayah_monitoring ?? 0;
            $tw3 = RiwayatMonitoring::where('monitoring_id', $riwayatMonitoring->monitoring_id)->where('tw', 3)->first()->total_wilayah_monitoring ?? 0;
            $totalWilayahMonitoring = (count($request->wilayah) + $tw3);
            $persentase = ($totalWilayahMonitoring / $totalSeluruhDesa) * 100;
            $riwayatMonitoring->total_wilayah_monitoring =  $totalWilayahMonitoring;
            $riwayatMonitoring->persentase = $persentase;
        }

        if ($riwayatMonitoring->is_valid == 2) {
            $riwayatMonitoring->is_valid = 0;
            $riwayatMonitoring->alasan = '';
        }
        $riwayatMonitoring->deskripsi = $request->deskripsi;
        $riwayatMonitoring->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayatMonitoring = RiwayatMonitoring::find($id);
        $riwayatMonitoring->delete();

        $dokumen = DokumenMonitoring::where('riwayat_monitoring_id', $id)->get();
        foreach ($dokumen as $item) {
            Storage::delete('monitoring/' . $item->dokumen);
            $item->delete();
        }

        $wilayahMonitoring = WilayahMonitoring::where('monitoring_id', $riwayatMonitoring->monitoring_id)->where('tw', $riwayatMonitoring->tw)->delete();

        return response()->json(['status' => 'success']);
    }

    public function destroyMonitoring($id)
    {
        $monitoring = Monitoring::find($id);
        $monitoring->delete();

        $riwayatMonitoring = RiwayatMonitoring::where('monitoring_id', $id)->get();
        foreach ($riwayatMonitoring as $item) {
            $dokumen = DokumenMonitoring::where('riwayat_monitoring_id', $item->id)->get();
            foreach ($dokumen as $item2) {
                Storage::delete('monitoring/' . $item2->dokumen);
                $item2->delete();
            }
            $wilayahMonitoring = WilayahMonitoring::where('monitoring_id', $item->monitoring_id)->where('tw', $item->tw)->delete();
            $item->delete();
        }

        return response()->json(['status' => 'success']);
    }

    public function verifikasi(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'verifikasi' => 'required',
                'alasan' => $request->verifikasi == '1' ? 'nullable' : 'required',
            ],
            [
                'verifikasi.required' => 'Verifikasi Harus Dipilih',
                'alasan.required' => 'Alasan Harus Diisi',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $riwayatMonitoring = RiwayatMonitoring::find($id);
        $riwayatMonitoring->is_valid = $request->verifikasi;
        $riwayatMonitoring->alasan = $request->alasan;
        $riwayatMonitoring->tanggal_verifikasi = Carbon::now();
        $riwayatMonitoring->save();

        return response()->json(['status' => 'success']);
    }
}
