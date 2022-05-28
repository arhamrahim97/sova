@extends('dashboard.layouts.main')

@section('title')
    Monitoring
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
            <a href="#">SPP</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Monitoring</a>
        </li>
    </ul>
@endsection

@section('content')
    <form method="POST" id="form-tambah" enctype="multipart/form-data" action="{{ url('monitoring') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Tambah Monitoring</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="col-lg-12 mb-3">
                                    <label for="TextInput" class="form-label my-2">Indikator</label>
                                    <br>
                                    <label for="TextInput"
                                        class="form-label my-2 fw-bold">{{ $monitoring->indikator->nama }}</label>
                                </div>
                                <div class="col-lg-12">
                                    @component('dashboard.components.formElements.ckEditor',
                                        [
                                            'label' => 'Deskripsi',
                                            'id' => 'deskripsi',
                                            'name' => 'deskripsi',
                                            'class' => 'ckeditor',
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
                                                    $wilayahMonitoring = \App\Models\WilayahMonitoring::where('monitoring_id', "$monitoring->id")
                                                        ->where('desa_kelurahan_id', "$item->id")
                                                        ->where('tw', '!=', "$tw")
                                                        ->first();

                                                    if ($wilayahMonitoring) {
                                                        $checked = 'checked';
                                                        $disabled = 'disabled';
                                                        $name = '';
                                                        $selectGroupButton = 'bg-success text-light border-success';
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
                                @if (Auth::user()->role == 'Admin')
                                    <label for="TextInput" class="form-label my-2">OPD</label>
                                    <br>
                                    <label for="TextInput"
                                        class="form-label my-2 fw-bold">{{ $monitoring->opd->nama }}</label>
                                @endif

                                <div class="card mt-4" id="card-keterangan-upload">
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
                                    <div class="card box-upload" id="box-upload-1" class="box-upload">
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- <div class="d-flex border rounded shadow shadow-lg p-2 "> -->
                                                <div class="col-3 d-flex align-items-center justify-content-center">
                                                    <img src="{{ asset('assets/dashboard/img/pdf.png') }}" alt=""
                                                        width="70px">
                                                </div>
                                                <div class="col-9">
                                                    <div class="mb-3 mt-2">
                                                        <input type="text" class="form-control nama_file" id="nama_file"
                                                            name="nama_file[]" placeholder="Masukkan Nama File" value="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <input name="file_dokumen[]" class="form-control file_dokumen"
                                                            type="file" multiple="true">
                                                        <p class="text-danger error-text nama_file-error my-0"></p>
                                                        <p class="text-danger error-text file_dokumen-error my-0"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button"
                                            class="btn btn-danger fw-bold card-footer bg-danger text-center p-0"
                                            onclick="hapus(1)"><i class="fas fa-trash-alt"></i>
                                            Hapus</button>
                                    </div>
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
        var totalList = 1;
        var monitoring_id = "{{ $monitoring->id }}";
        var tw = "{{ $tw }}";

        $(document).ready(function() {
            $('#monitoring').addClass('active');
        })

        function hapus(id) {
            $('#box-upload-' + id).fadeOut("slow", function() {
                $("#box-upload-" + id).remove();
            });
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
            resetError();
            submitCkEditor();

            var totalDokumenKosong = 0;
            var totalNamaKosong = 0;
            var indexArray = 0;

            $(".file_dokumen-error").each(function() {
                $(this).html('');
            })

            $(".nama_file-error").each(function() {
                $(this).html('');
            })

            if ($('.file_dokumen').length == 0) {
                swal("Dokumen harus ada minimal 1", {
                    buttons: false,
                    timer: 1500,
                    icon: "warning",
                });
                return false;
            }

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

            if (totalDokumenKosong != 0 || totalNamaKosong != 0) {
                swal("Periksa Kembali Data Anda", {
                    buttons: false,
                    timer: 1500,
                    icon: "warning",
                });
                return false;
            }

            var formData = new FormData($(this)[0]);
            formData.append('monitoring_id', monitoring_id);
            formData.append('tw', tw);
            $.ajax({
                url: "{{ url('monitoring') }}",
                type: "POST",
                data: formData,
                async: false,
                success: function(response) {
                    console.log(response);
                    if (response.status == "success") {
                        swal("Berhasil",
                            "Dokumen berhasil ditambahkan", {
                                button: false,
                                icon: "success",
                            });
                        setTimeout(
                            function() {
                                $(location).attr('href', "{{ url('monitoring') }}");
                            }, 2000);
                    } else {
                        printErrorMsg(response.error);
                    }
                },
                error: function(response) {
                    swal("Gagal", "Data Gagal Ditambahkan", {
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

        function resetError() {
            $('.indikator-error').text('');
            $('.opd-error').text('');
            $('.deskripsi-error').text('');
            $('.wilayah-error').text('');
        }

        function resetModal() {
            resetError();
            $('#form-tambah')[0].reset();
        }

        function submitCkEditor() {
            for (var i in CKEDITOR.instances) {
                CKEDITOR.instances[i].updateElement();
            }
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
