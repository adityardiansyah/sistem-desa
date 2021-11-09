@extends('layouts.app')
@section('title')
    Data Kematian
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
                        DATA KEMATIAN
                    </h2>
                    <div class="header-dropdown m-r--5">
                        @if (Session::get('hak_akses') === 3)
                        <a href="{{ route('data_kematian.form', ['tab' => 'new', 'id'=>'all']) }}" class="btn btn-primary">Tambah</a>
                        @endif
                    </div>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat Meninggal</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tempat_wafat }}</td>
                                    <td>{{ $item->hari_wafat }}, {{ date('d-m-Y', strtotime($item->tgl_wafat)) }} {{ $item->pukul }}</td>
                                    <td>{{ $item->status === 0? 'Belum Diverifikasi': 'Sudah Diverifikasi' }}</td>
                                    <td>
                                        @if (Session::get('hak_akses') === 1 && $item->status === 0)
                                            <a href="{{ route('data_kematian.confirm', ['id' => $item->id, 'type'=>'terima']) }}" class="btn btn-success">Terima</a>
                                            <a href="{{ route('data_kematian.confirm', ['id' => $item->id, 'type'=>'tolak']) }}" class="btn btn-danger">Tolak</a>
                                        @elseif(Session::get('hak_akses') === 2 && $item->status === 1 && $item->nik_kades === null)
                                            <a href="{{ route('data_kematian.confirm', ['id' => $item->id, 'type'=>'verifikasi']) }}" class="btn btn-success">Verifikasi</a>
                                        @elseif(Session::get('hak_akses') === 1 || Session::get('hak_akses') === 3)
                                            @if ($item->status === 1 && $item->nik_kades != null)
                                            <a href="{{ route('data_kematian.print',$item->id) }}" target="_blank" class="btn btn-secondary">Cetak</a>
                                            @endif
                                            <a href="{{ route('data_kematian.form',['tab'=>'edit', 'id'=>$item->id]) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('data_kematian.delete',$item->id) }}" class="btn btn-danger">Hapus</a>
                                        @endif
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