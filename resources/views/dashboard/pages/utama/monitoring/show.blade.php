@extends('dashboard.layouts.main')

@section('title')
    Detail Monitoring
@endsection

@push('style')
    <style>
        img {
            max-width: 100%;
            height: auto !important;
        }

    </style>
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
            <a href="#">Monitoring</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Detail Monitoring</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">
                            Detail Indikator
                        </div>
                        <div class="card-tools">
                            @if (Auth::user()->role == 'Admin' && $riwayatMonitoring->is_valid == 0)
                                @component('dashboard.components.buttons.verifikasi',
                                    [
                                        'id' => 'btn-verifikasi',
                                        'class' => '',
                                        'url' => '/anc/create',
                                        'type' => 'button',
                                    ])
                                @endcomponent
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="col-lg-12">
                                <label for="TextInput" class="form-label my-2">Indikator</label>
                                <br>
                                <label for="TextInput"
                                    class="form-label fw-bold">{{ $monitoring->indikator->nama }}</label>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label for="TextInput" class="form-label my-2">OPD</label>
                                <br>
                                <label for="TextInput" class="form-label fw-bold">{{ $monitoring->opd->nama }}</label>
                            </div>
                            <div class="col-lg-12">
                                <label for="TextInput" class="form-label my-2">TW</label>
                                <br>
                                <label for="TextInput" class="form-label fw-bold">{{ $riwayatMonitoring->tw }}</label>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label for="TextInput" class="form-label my-2">Deskripsi</label>
                                <br>
                                {!! $riwayatMonitoring->deskripsi !!}
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Wilayah</label>
                                    <br>
                                    <span class="text-danger error-text wilayah-error"></span>
                                    <div class="selectgroup selectgroup-pills">
                                        @foreach ($wilayahMonitoring as $item)
                                            <label class="selectgroup-item">
                                                <input type="checkbox" class="selectgroup-input" checked disabled>
                                                <span class="selectgroup-button ">{{ $item->desaKelurahan->nama }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            @component('dashboard.components.widgets.listDokumen',
                                [
                                    'listDokumen' => $riwayatMonitoring->dokumen,
                                    'riwayatMonitoring' => $riwayatMonitoring,
                                ])
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" id="form-validasi" enctype="multipart/form-data">
        @component('dashboard.components.modals.verifikasi')
        @endcomponent
    </form>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#div-alasan').hide();
        })

        $('#btn-verifikasi').click(function() {
            $('#form-validasi').trigger("reset");
            $('#modal-verifikasi').modal('show');
        });

        $('#verifikasi').on('change', function() {
            if ($(this).val() == 1) {
                $('#div-alasan').hide();
            } else {
                $('#div-alasan').show();
            }
        })

        $('#form-validasi').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'PUT',
                url: "{{ url('monitoring/verifikasi/' . $riwayatMonitoring->id) }}",
                data: $(this).serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        $('#modal-verifikasi').modal('hide');
                        swal("Berhasil", "Data Berhasil Disimpan", {
                            icon: "success",
                            buttons: false,
                            timer: 1000,
                        }).then(function() {
                            window.location.href =
                                "{{ url('monitoring') }}";
                        })
                    } else {
                        printErrorMsg(response.error);
                    }
                },
                error: function(response) {
                    swal({
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat memproses data',
                        type: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    })
                }
            })
        })
    </script>

    <script>
        const printErrorMsg = (msg) => {
            $.each(msg, function(key, value) {
                $('.' + key + '-error').text(value);
            });
        }

        $(document).ready(function() {
            $('#monitoring').addClass('active');
        })
    </script>
@endpush
