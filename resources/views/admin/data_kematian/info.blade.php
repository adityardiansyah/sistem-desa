@extends('layouts.app')
@section('title')
    Data Penduduk
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('public/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/bootstrap-select/css/bootstrap-select.css') }}">
@endpush

@section('content')
    
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        @if ($tab == 'new')
                            TAMBAH
                        @else
                            EDIT
                        @endif DATA KEMATIAN
                    </h2>
                    <div class="header-dropdown m-r--5">
                        <a href="" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
                <div class="body">
                    @if ($tab == 'new')
                    <form action="{{ route('data_kematian.store', ['tab'=>'new', 'id'=>'all'])}}" method="POST">
                    @else
                    <form action="{{ route('data_kematian.store', ['tab'=>'edit', 'id'=>$id])}}" method="POST">
                    @endif
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="nik" required class="form-control" placeholder="NIK Penduduk" @if($tab == 'edit') value="{{ $data->nik }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="sebab_wafat" required class="form-control" placeholder="Sebab Meninggal" @if($tab == 'edit') value="{{ $data->sebab_wafat }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="tempat_wafat" required class="form-control" placeholder="Tempat Meninggal" @if($tab == 'edit') value="{{ $data->tempat_wafat }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="hari_wafat" required class="form-control" placeholder="Hari Wafat" @if($tab == 'edit') value="{{ $data->hari_wafat }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="time" name="pukul" required class="form-control" placeholder="Pukul" @if($tab == 'edit') value="{{ $data->pukul }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="tgl_wafat" required class="form-control" placeholder="Tanggal Lahir" @if($tab == 'edit') value="{{ $data->tgl_wafat }}"  @endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@if(\Session::has('message'))
@php
    $message = Session::get('message');
@endphp
<script>
    swal({
        animation: "slide-from-top",
        type: "success",
        title: "berhasil",
        showConfirmButton: false,
        timer: 3000,
        toast: true,
        showConfirmButton: false
    })
</script>
@endif

<script src="{{ asset('public/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('public/js/pages/tables/jquery-datatable.js') }}"></script>
    {{-- <script src="{{ asset('public/js/pages/forms/basic-form-elements.js') }}"></script> --}}
@endpush