@extends('dashboard.layouts.main')

@section('title')
    Edit Monitoring
@endsection

@push('style')
    <style>
        #nama_file {
            border: 1px solid grey;
            font-weight: bold;
            height: 23px;
            font-size: 15px;
        }

        .box-upload .card-body {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }

        .box-upload {
            border-radius: 10px;
            border: 1px solid rgb(24, 23, 23, 0.15);
        }

        .box-upload .card-footer {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }

        .card-profile .card-header {
            background: rgb(34, 195, 80);
            background: linear-gradient(101deg, rgba(34, 195, 80, 1) 0%, rgba(253, 187, 45, 1) 100%);
        }

        #card-tambah {
            cursor: pointer;
        }

        #card-keterangan-upload {
            border-style: dashed;
            border-color: grey;
            border-width: 1px;
        }

        #card-keterangan-upload .card-body {
            padding-top: 30px;
            padding-bottom: 30px;
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
            <a href="#">Edit Monitoring</a>
        </li>
    </ul>
@endsection

@section('content')
    <form id="form-tambah" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Edit Monitoring</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="col-lg-12">
                                    <label for="TextInput" class="form-label my-2">Indikator</label>
                                    <br>
                                    <label for="TextInput"
                                        class="form-label fw-bold">{{ $monitoring->indikator->nama }}</label>
                                </div>
                                @if (Auth::user()->role != 'Admin')
                                    <div class="col-lg-12 mt-3">
                                        <label for="TextInput" class="form-label my-2">OPD</label>
                                        <br>
                                        <label for="TextInput"
                                            class="form-label fw-bold">{{ $monitoring->opd->nama }}</label>
                                    </div>
                                @endif
                                <div class="col-lg-12">
                                    <label for="TextInput" class="form-label my-2">TW</label>
                                    <br>
                                    <label for="TextInput" class="form-label fw-bold">{{ $riwayatMonitoring->tw }}</label>
                                </div>
                                <div class="col-lg-12">
                                    @component('dashboard.components.formElements.ckEditor',
                                        [
                                            'label' => 'Deskripsi',
                                            'id' => 'deskripsi',
                                            'name' => 'deskripsi',
                                            'class' => 'ckeditor',
                                            'value' => $riwayatMonitoring->deskripsi,
                                            'wajib' => '<sup class="text-danger">*</sup>',
                                        ])
                                    @endcomponent
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Wilayah</label>
                                        <br>
                                        <span class="text-danger error-text wilayah-error"></span>
                                        <div class="selectgroup selectgroup-pills">
                                            @foreach ($desaKelurahan as $item)
                                                @php
                                                    $checked = '';
                                                    $disabled = '';
                                                    $selectGroupButton = '';
                                                    $name = 'wilayah[]';
                                                    $wilayahMonitoring = \App\Models\WilayahMonitoring::where('monitoring_id', $monitoring->id)
                                                        ->where('desa_kelurahan_id', $item->id)
                                                        ->where('tw', '!=', $riwayatMonitoring->tw)
                                                        ->first();

                                                    if ($wilayahMonitoring) {
                                                        $checked = 'checked';
                                                        $disabled = 'disabled';
                                                        $name = '';
                                                        $selectGroupButton = 'bg-success text-light border-success';
                                                    } else {
                                                        $wilayahMonitoring = \App\Models\WilayahMonitoring::where('monitoring_id', $monitoring->id)
                                                            ->where('desa_kelurahan_id', $item->id)
                                                            // ->where('tw', '==', $riwayatMonitoring->tw)
                                                            ->whereIn('id', $wilayahMonitoringId)
                                                            ->first();
                                                        if ($wilayahMonitoring) {
                                                            $checked = 'checked';
                                                            $disabled = '';
                                                        }
                                                    }
                                                @endphp
                                                <label class="selectgroup-item">
                                                    <input type="checkbox" name="{{ $name }}"
                                                        value="{{ $item->id }}" class="selectgroup-input"
                                                        {{ $checked }} {{ $disabled }}>
                                                    <span
                                                        class="selectgroup-button {{ $selectGroupButton }}">{{ $item->nama }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                @if ($riwayatMonitoring->is_valid == 2)
                                    @component('dashboard.components.widgets.alert',
                                        [
                                            'classBg' => 'bg-danger text-light',
                                            'judul' => 'Alasan Ditolak',
                                            'isi' => $riwayatMonitoring->alasan,
                                        ])
                                    @endcomponent
                                @endif

                                <div class="card" id="card-keterangan-upload">
                                    <div class="card-body text-center">
                                        <i class="fas fa-file-upload" style="font-size: 75px"></i>
                                        <p class="my-0">Upload Dokumen</p>
                                        <p class="my-0">Ukuran Maksimum File Adalah <span class="text-danger">5
                                                MB</span> Dengan Tipe File
                                            <span class="text-danger">PDF</span>
                                        </p>
                                    </div>
                                </div>
                                <div id="list-upload">
                                    <hr>
                                    @foreach ($riwayatMonitoring->dokumen as $dokumen)
                                        <div class="card box-upload" id="box-upload-{{ $loop->iteration }}"
                                            class="box-upload">
                                            <div class="card-body">
                                                <div class="row">
                                                    <!-- <div class="d-flex border rounded shadow shadow-lg p-2 "> -->
                                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                                        <img src="{{ asset('assets/dashboard/img/pdf.png') }}" alt=""
                                                            width="70px">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="mb-3 mt-2">
                                                            <input type="text" class="form-control nama_file_update"
                                                                id="nama_file" name="nama_file_update[]"
                                                                placeholder="Masukkan Nama File"
                                                                value="{{ $dokumen->nama_dokumen }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input name="file_dokumen_update[]"
                                                                class="form-control file_dokumen_update" type="file"
                                                                multiple="true" data-id="{{ $dokumen->id }}">
                                                            <span class="text-mute" style="font-size: 11px">Kosongkan
                                                                Dokumen Jika Tidak Ingin
                                                                Merubah Dokumen</span>
                                                            <p class="text-danger error-text nama_file_update-error my-0">
                                                            </p>
                                                            <p
                                                                class="text-danger error-text file_dokumen_update-error my-0">
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button"
                                                class="btn btn-danger fw-bold card-footer bg-danger text-center p-0"
                                                onclick="hapusUpdate({{ $loop->iteration }},{{ $dokumen->id }})"><i
                                                    class="fas fa-trash-alt"></i>
                                                Hapus</button>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="card bg-primary" id="card-tambah">
                                    <div class="card-body text-light text-center">
                                        <i class="fas fa-plus-circle fa-2xl" style="font-size: 75px"></i>
                                        <p class="my-0 fw-bold">Tambah Dokumen</p>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success col-12 text-light fw-bold"><i
                                        class="far fa-paper-plane"></i>
                                    Upload
                                    Dokumen</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('script')
    <script>
        var totalList = {{ count($riwayatMonitoring->dokumen) }};
        var arrayNamaFileUpdate = {{ json_encode($riwayatMonitoring->dokumen->pluck('id')->toArray()) }};
        var arrayDokumenHapus = [];
        var arrayDokumenUpdate = [];

        $(document).ready(function() {
            $('#monitoring').addClass('active');
        })

        function hapus(id) {
            $('#box-upload-' + id).fadeOut("slow", function() {
                $("#box-upload-" + id).remove();
            });

        }

        function hapusUpdate(id, value) {
            $('#box-upload-' + id).fadeOut("slow", function() {
                $("#box-upload-" + id).remove();
            });
            arrayNamaFileUpdate = arrayNamaFileUpdate.filter(item => item !== value);
            arrayDokumenHapus.push(value);
        }

        $('#card-tambah').click(function() {
            totalList++;
            var cardUpload =
                '<div class="card box-upload" id="box-upload-' + totalList +
                '" style="display: none;"><div class="card-body"><div class="row"><div class="col-3 d-flex align-items-center justify-content-center"><img src="{{ asset('assets/dashboard/img/pdf.png') }}" alt=""width="70px"></div><div class="col-9"><div class="mb-3 mt-2"><input type="text" class="form-control nama_file" id="nama_file" name="nama_file[]" placeholder="Masukkan Nama File" value=""></div><div class="mb-3"><input name="file_dokumen[]" class="form-control file_dokumen" type="file" id="formFile"  multiple="true"><p class="text-danger error-text nama_file-error my-0"></p><p class="text-danger error-text file_dokumen-error my-0"></p></div></div></div></div><button type="button" class="btn btn-danger fw-bold card-footer bg-danger text-center p-0" onclick="hapus(' +
                totalList + ')"><i class="fas fa-trash-alt"></i> Hapus</button>';
            $('#list-upload').append(cardUpload);
            $('#box-upload-' + totalList).fadeIn("slow");
        })

        $('#form-tambah').submit(function(e) {
            e.preventDefault();
            var totalDokumenKosong = 0;
            var totalNamaKosong = 0;
            var indexArray = 0;
            arrayDokumenUpdate = [];
            submitCkEditor();

            $('.surat-penolakan_error').html('');

            $(".file_dokumen_update-error").each(function() {
                $(this).html('');
            })

            $(".nama_file_update-error").each(function() {
                $(this).html('');
            })

            $(".file_dokumen-error").each(function() {
                $(this).html('');
            })

            $(".nama_file-error").each(function() {
                $(this).html('');
            })

            $(".file_dokumen").each(function() {
                if ($(this).val() == '') {
                    $('.file_dokumen-error')[indexArray].innerHTML = 'Dokumen Tidak Boleh Kosong';
                    totalDokumenKosong++;
                }

                if ($(".nama_file")[indexArray].value == '') {
                    $('.nama_file-error')[indexArray].innerHTML = 'Nama File Tidak Boleh Kosong';
                    totalNamaKosong++;
                }

                indexArray++;
            })

            $(".file_dokumen_update").each(function() {
                if ($(this).val() != '') {
                    arrayDokumenUpdate.push($(this).data('id'));
                }
            })

            if (totalDokumenKosong != 0 || totalNamaKosong != 0) {
                swal("Periksa Kembali Data Anda", {
                    buttons: false,
                    timer: 1500,
                    icon: "warning",
                });
                return false;
            }

            var formData = new FormData($(this)[0]);
            formData.append('arrayNamaFileUpdate', JSON.stringify(arrayNamaFileUpdate));
            formData.append('arrayDokumenHapus', JSON.stringify(arrayDokumenHapus));
            formData.append('arrayDokumenUpdate', JSON.stringify(arrayDokumenUpdate));
            $.ajax({
                url: "{{ url('monitoring/' . $riwayatMonitoring->id) }}",
                type: "POST",
                data: formData,
                async: false,
                success: function(response) {
                    if (response.status == "success") {
                        swal("Berhasil",
                            "Dokumen berhasil diubah", {
                                button: false,
                                icon: "success",
                            });
                        setTimeout(
                            function() {
                                $(location).attr('href', "{{ url('monitoring') }}");
                            }, 2000);
                    } else {
                        swal("Periksa Kembali Data Anda", {
                            buttons: false,
                            timer: 1500,
                            icon: "warning",
                        });
                        printErrorMsg(response.error);
                    }
                },
                error: function(response) {
                    swal("Gagal", "Data Gagal Diubah", {
                        icon: "error",
                        buttons: false,
                        timer: 1000,
                    });
                },
                cache: false,
                contentType: false,
                processData: false
            });
        })

        function printErrorMsg(msg) {
            $.each(msg, function(keyError, valueError) {
                var totalError = valueError.length;
                var indexError = 0;
                $.each(valueError, function(key, value) {
                    if (keyError.split(".").length > 1) {
                        $('.' + keyError.split(".")[0] + '-error')[keyError.split(".")[1]].innerHTML = $(
                            '.' +
                            keyError.split(".")[0] + '-error')[keyError.split(".")[1]].innerHTML + value;
                        if ((indexError + 1) != totalError) {
                            $('.' + keyError.split(".")[0] + '-error')[keyError.split(".")[1]].innerHTML =
                                $(
                                    '.' +
                                    keyError.split(".")[0] + '-error')[keyError.split(".")[1]].innerHTML +
                                ", ";
                        }
                    } else {
                        $('.' + keyError + '-error').text(value);
                    }
                    indexError++;
                });
            });
        }

        function submitCkEditor() {
            for (var i in CKEDITOR.instances) {
                CKEDITOR.instances[i].updateElement();
            }
        }

        function resetError() {
            resetErrorElement('nama');
        }

        function resetModal() {
            resetError();
            $('#form-tambah')[0].reset();
        }

        // function printErrorMsg(msg) {
        //     $('.jawaban-error').each(function(i, o) {
        //         $(o).text('');
        //     })
        //     var i = 0;
        //     $.each(msg, function(key, value) {
        //         $('.text-jawaban').each(function(i, o) {
        //             if ($(o).val() == '') {
        //                 $('.jawaban-error').eq(i).text(value);
        //             };
        //         })
        //     });
        // }
    </script>
@endpush
