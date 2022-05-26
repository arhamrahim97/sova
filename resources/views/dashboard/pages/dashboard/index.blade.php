@extends('dashboard.layouts.main')

@section('title')
    Dashboard
@endsection

@push('style')
@endpush

@section('breadcrumb')
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
                <i class="flaticon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Dashboard</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Dashboard</div>
                        <div class="card-tools">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab-nobd" data-toggle="pill"
                                        href="#pills-home-nobd" role="tab" aria-controls="pills-home-nobd"
                                        aria-selected="true">OPD</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill"
                                        href="#pills-profile-nobd" role="tab" aria-controls="pills-profile-nobd"
                                        aria-selected="false">Indikator</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill"
                                        href="#pills-contact-nobd" role="tab" aria-controls="pills-contact-nobd"
                                        aria-selected="false">TW</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-1">
                    <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                        <div class="tab-pane fade show active" id="pills-home-nobd" role="tabpanel"
                            aria-labelledby="pills-home-tab-nobd">
                            <div class="row mb-4" id="filter">
                                <div class="col-md-6">
                                    <div class="form-group px-0">
                                        <label for="tahun">Tahun</label>
                                        <select class="form-control" id="tahun">
                                            <option value="">Pilih Tahun</option>
                                            <option value="" selected>2022</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" data-select2-id="95">
                                    <div class="form-group px-0">
                                        <label for="squareSelect">OPD</label>
                                        <select class="form-control input-square" id="squareSelect">
                                            <option selected>Semua</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="h4 m-0">DINAS PENDIDIKAN DAN KEBUDAYAAN</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">Edukasi Cara Membayar Pajak Via Sosial
                                                            Media</h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 1</span>
                                                                    <span class="text-muted fw-bold"> 20%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-danger"
                                                                        role="progressbar" style="width: 20%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 2</span>
                                                                    <span class="text-muted fw-bold"> 50%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-warning"
                                                                        role="progressbar" style="width: 50%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 3</span>
                                                                    <span class="text-muted fw-bold"> 70%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-info"
                                                                        role="progressbar" style="width: 70%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 4</span>
                                                                    <span class="text-muted fw-bold"> 90%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                                        role="progressbar" style="width: 90%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">Memberikan bantuan sembako</h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 1</span>
                                                                    <span class="text-muted fw-bold"> 40%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-warning"
                                                                        role="progressbar" style="width: 40%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 2</span>
                                                                    <span class="text-muted fw-bold"> 60%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-info"
                                                                        role="progressbar" style="width: 60%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 3</span>
                                                                    <span class="text-muted fw-bold"> 100%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                                        role="progressbar" style="width: 100%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="h4 m-0">DINAS KETENAGAKERJAAN DAN TRANSMIGRASI</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">Pemasangan Rambu-rambu jalur evakuasi
                                                        </h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 2</span>
                                                                    <span class="text-muted fw-bold"> 100%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                                        role="progressbar" style="width: 100%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="h4 m-0">DINAS KESEHATAN</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">Pembagian Masker</h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 3</span>
                                                                    <span class="text-muted fw-bold"> 20%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-danger"
                                                                        role="progressbar" style="width: 20%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 4</span>
                                                                    <span class="text-muted fw-bold"> 50%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-warning"
                                                                        role="progressbar" style="width: 50%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- </div> --}}
                        </div>
                        <div class="tab-pane fade" id="pills-profile-nobd" role="tabpanel"
                            aria-labelledby="pills-profile-tab-nobd">
                            <div class="row mb-4" id="filter">
                                <div class="col-md-6">
                                    <div class="form-group px-0">
                                        <label for="tahun">Tahun</label>
                                        <select class="form-control" id="tahun">
                                            <option value="">Pilih Tahun</option>
                                            <option value="" selected>2022</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" data-select2-id="95">
                                    <div class="form-group px-0">
                                        <label for="squareSelect">Indikator</label>
                                        <select class="form-control input-square" id="squareSelect">
                                            <option selected>Semua</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="h4 m-0">Edukasi Cara Membayar Pajak Via Sosial</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">DINAS PENDIDIKAN DAN KEBUDAYAAN</h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 1</span>
                                                                    <span class="text-muted fw-bold"> 30%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-warning"
                                                                        role="progressbar" style="width: 30%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 2</span>
                                                                    <span class="text-muted fw-bold"> 70%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-info"
                                                                        role="progressbar" style="width: 70%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 3</span>
                                                                    <span class="text-muted fw-bold"> 100%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                                        role="progressbar" style="width: 100%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">DINAS SOSIAL</h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 1</span>
                                                                    <span class="text-muted fw-bold"> 40%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-warning"
                                                                        role="progressbar" style="width: 40%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 2</span>
                                                                    <span class="text-muted fw-bold"> 60%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-info"
                                                                        role="progressbar" style="width: 60%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 3</span>
                                                                    <span class="text-muted fw-bold"> 70%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-info"
                                                                        role="progressbar" style="width: 70%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 4</span>
                                                                    <span class="text-muted fw-bold"> 100%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                                        role="progressbar" style="width: 100%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="h4 m-0">Pembangunan MCK</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">DINAS PARIWISATA</h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 1</span>
                                                                    <span class="text-muted fw-bold"> 40%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-warning"
                                                                        role="progressbar" style="width: 40%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">TW 2</span>
                                                                    <span class="text-muted fw-bold"> 60%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-info"
                                                                        role="progressbar" style="width: 60%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact-nobd" role="tabpanel"
                            aria-labelledby="pills-contact-tab-nobd">
                            <div class="row mb-4" id="filter">
                                <div class="col-md-6">
                                    <div class="form-group px-0">
                                        <label for="tahun">Tahun</label>
                                        <select class="form-control" id="tahun">
                                            <option value="">Pilih Tahun</option>
                                            <option value="" selected>2022</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" data-select2-id="95">
                                    <div class="form-group px-0">
                                        <label for="squareSelect">TW</label>
                                        <select class="form-control input-square" id="squareSelect">
                                            <option selected>Semua</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="h4 m-0">TW 1</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">DINAS PENDIDIKAN DAN KEBUDAYAAN</h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">Edukasi Cara Membayar
                                                                        Pajak Via Sosial Media</span>
                                                                    <span class="text-muted fw-bold"> 20%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-danger"
                                                                        role="progressbar" style="width: 20%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">Memberikan bantuan
                                                                        sembako</span>
                                                                    <span class="text-muted fw-bold"> 40%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-warning"
                                                                        role="progressbar" style="width: 40%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="h4 m-0">TW 2</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">DINAS PENDIDIKAN DAN KEBUDAYAAN</h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">Edukasi Cara Membayar
                                                                        Pajak Via Sosial Media</span>
                                                                    <span class="text-muted fw-bold"> 40%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-warning"
                                                                        role="progressbar" style="width: 40%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">Memberikan bantuan
                                                                        sembako</span>
                                                                    <span class="text-muted fw-bold"> 60%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-info"
                                                                        role="progressbar" style="width: 60%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">DINAS KETENAGAKERJAAN DAN TRANSMIGRASI
                                                        </h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">Pemasangan Rambu-rambu
                                                                        jalur evakuasi </span>
                                                                    <span class="text-muted fw-bold"> 100%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                                        role="progressbar" style="width: 100%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="h4 m-0">TW 3</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">DINAS PENDIDIKAN DAN KEBUDAYAAN</h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">Edukasi Cara Membayar
                                                                        Pajak Via Sosial Media</span>
                                                                    <span class="text-muted fw-bold"> 70%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-info"
                                                                        role="progressbar" style="width: 70%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">Memberikan bantuan
                                                                        sembako</span>
                                                                    <span class="text-muted fw-bold"> 100%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                                        role="progressbar" style="width: 100%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">DINAS KESEHATAN</h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">Pembagian Masker</span>
                                                                    <span class="text-muted fw-bold"> 20%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-danger"
                                                                        role="progressbar" style="width: 20%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="h4 m-0">TW 4</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">DINAS PENDIDIKAN DAN KEBUDAYAAN</h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">Edukasi Cara Membayar
                                                                        Pajak Via Sosial Media</span>
                                                                    <span class="text-muted fw-bold"> 90%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                                        role="progressbar" style="width: 90%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card mb-0 shadow-none">
                                                        <h5 class="text-center">DINAS KESEHATAN</h5>
                                                        <div class="demo">
                                                            <div class="progress-card">
                                                                <div class="progress-status">
                                                                    <span class="text-muted">Pembagian Masker</span>
                                                                    <span class="text-muted fw-bold"> 50%</span>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-warning"
                                                                        role="progressbar" style="width: 50%"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        data-toggle="tooltip" data-placement="top" title="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#dashboard').addClass('active');
        })

        var myPieChart = new Chart(pieChart, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [40, 15, 15, 30],
                    backgroundColor: ["#1d7af3", "#f3545d", "#fdaf4b", "#9b59b6"],
                    borderWidth: 0
                }],
                labels: ['TW1', 'TW2', 'TW3', 'TW4']
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                    labels: {
                        fontColor: 'rgb(154, 154, 154)',
                        fontSize: 11,
                        usePointStyle: true,
                        padding: 20
                    }
                },
                pieceLabel: {
                    render: 'percentage',
                    fontColor: 'white',
                    fontSize: 14,
                },
                tooltips: false,
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                }
            }
        })

        var myPieChart = new Chart(pieChart2, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [50, 35, 15],
                    backgroundColor: ["#1d7af3", "#f3545d", "#fdaf4b"],
                    borderWidth: 0
                }],
                labels: ['TW1', 'TW2', 'TW3']
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                    labels: {
                        fontColor: 'rgb(154, 154, 154)',
                        fontSize: 11,
                        usePointStyle: true,
                        padding: 20
                    }
                },
                pieceLabel: {
                    render: 'percentage',
                    fontColor: 'white',
                    fontSize: 14,
                },
                tooltips: false,
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                }
            }
        })

        var myPieChart = new Chart(pieChart3, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [20, 30, 0, 0],
                    backgroundColor: ["#1d7af3", "#f3545d", "#fdaf4b", "#9b59b6"],
                    borderWidth: 0
                }],
                labels: ['TW1', 'TW2']
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                    labels: {
                        fontColor: 'rgb(154, 154, 154)',
                        fontSize: 11,
                        usePointStyle: true,
                        padding: 20
                    }
                },
                pieceLabel: {
                    render: 'percentage',
                    fontColor: 'white',
                    fontSize: 14,
                },
                tooltips: false,
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                }
            }
        })
    </script>
@endpush
