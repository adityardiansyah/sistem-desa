@extends('layouts.app')
@section('title')
    Data Penduduk
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">
@endpush

@section('content')
    
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA PENDUDUK
                    </h2>
                    <div class="header-dropdown m-r--5">
                        <a href="{{ route('data_penduduk.form', ['tab' => 'cetak', 'id'=>'all']) }}" class="btn btn-info">Cetak</a>
                        <a href="{{ route('data_penduduk.form', ['tab' => 'new', 'id'=>'all']) }}" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Agama</th>
                                    <th>Pekerjaan</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->agama }}</td>
                                    <td>{{ $item->pekerjaan }}</td>
                                    <td>{{ $item->tempat_lahir }}, {{ date('d-m-Y', strtotime($item->tgl_lahir)) }}</td>
                                    <td>
                                        <a href="{{ route('data_penduduk.form',['tab'=>'edit', 'id'=>$item->id]) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('data_penduduk.delete',$item->id) }}" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('public/assets/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/tables/jquery-datatable.js') }}"></script>
@endpush