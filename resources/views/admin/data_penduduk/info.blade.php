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
                        @endif DATA PENDUDUK
                    </h2>
                    <div class="header-dropdown m-r--5">
                        <a href="" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
                <div class="body">
                    @if ($tab == 'new')
                    <form action="{{ route('data_penduduk.store', ['tab'=>'new', 'id'=>'all'])}}" method="POST">
                    @else
                    <form action="{{ route('data_penduduk.store', ['tab'=>'edit', 'id'=>$id])}}" method="POST">
                    @endif
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="no_kk" class="form-control" placeholder="Nomor KK" @if($tab=='edit') value="{{ $data->no_kk }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="nik" class="form-control" placeholder="NIK" @if($tab=='edit') value="{{ $data->nik }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" @if($tab=='edit') value="{{ $data->nama }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" @if($tab=='edit') value="{{ $data->tempat_lahir }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" @if($tab=='edit') value="{{ $data->tgl_lahir }}"  @endif>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-6">
                                <select class="form-control show-tick" name="jk">
                                    <option value="">-- Pilih Jenis Kelamin--</option>
                                    <option value="Laki-Laki" @if($tab=='edit') {{ $data->jk == 'Laki-Laki'? 'selected' : ''}}  @endif>Laki-Laki</option>
                                    <option value="Perempuan" @if($tab=='edit') {{ $data->jk == 'Perempuan'? 'selected' : ''}}  @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control show-tick" name="agama">
                                    <option value="">-- Pilih Agama--</option>
                                    <option value="Islam" @if($tab=='edit') {{ $data->agama == 'Islam'? 'selected' : ''}}  @endif>Islam</option>
                                    <option value="Kristen" @if($tab=='edit') {{ $data->agama == 'Kristen'? 'selected' : ''}}  @endif>Kristen</option>
                                    <option value="Katolik" @if($tab=='edit') {{ $data->agama == 'Katolik'? 'selected' : ''}}  @endif>Katolik</option>
                                    <option value="Budha" @if($tab=='edit') {{ $data->agama == 'Budha'? 'selected' : ''}}  @endif>Budha</option>
                                    <option value="Hindu" @if($tab=='edit') {{ $data->agama == 'Hindu'? 'selected' : ''}}  @endif>Hindu</option>
                                    <option value="Konghucu" @if($tab=='edit') {{ $data->agama == 'Konghucu'? 'selected' : ''}}  @endif>Konghucu</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control show-tick" name="status_perkawinan">
                                    <option value="">-- Pilih Status Perkawinan--</option>
                                    <option value="Sudah" @if($tab=='edit') {{ $data->status_perkawinan == 'Sudah'? 'selected' : ''}}  @endif>Sudah</option>
                                    <option value="Belum" @if($tab=='edit') {{ $data->status_perkawinan == 'Belum'? 'selected' : ''}}  @endif>Belum</option>
                                </select>
                            </div>
    
                            <div class="col-sm-3">
                                <select class="form-control show-tick" name="pendidikan">
                                    <option value="">-- Pilih Pendidikan--</option>
                                    <option value="SD" @if($tab=='edit') {{ $data->pendidikan == 'SD'? 'selected' : ''}}  @endif>SD</option>
                                    <option value="SMP" @if($tab=='edit') {{ $data->pendidikan == 'SMP'? 'selected' : ''}}  @endif>SMP</option>
                                    <option value="SMA" @if($tab=='edit') {{ $data->pendidikan == 'SMA'? 'selected' : ''}}  @endif>SMA</option>
                                    <option value="D1" @if($tab=='edit') {{ $data->pendidikan == 'D1'? 'selected' : ''}}  @endif>D1</option>
                                    <option value="D2" @if($tab=='edit') {{ $data->pendidikan == 'D2'? 'selected' : ''}}  @endif>D2</option>
                                    <option value="D3" @if($tab=='edit') {{ $data->pendidikan == 'D3'? 'selected' : ''}}  @endif>D3</option>
                                    <option value="S1" @if($tab=='edit') {{ $data->pendidikan == 'S1'? 'selected' : ''}}  @endif>S1</option>
                                    <option value="S2" @if($tab=='edit') {{ $data->pendidikan == 'S2'? 'selected' : ''}}  @endif>S2</option>
                                    <option value="S3" @if($tab=='edit') {{ $data->pendidikan == 'S3'? 'selected' : ''}}  @endif>S3</option>
                                    <option value="Lainnya" @if($tab=='edit') {{ $data->pendidikan == 'Lainnya'? 'selected' : ''}}  @endif>Lainnya</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control show-tick" name="pekerjaan">
                                    <option value="">-- Pilih Pekerjaan--</option>
                                    <option value="Siswa/Mahasiswa" @if($tab=='edit') {{ $data->pekerjaan == 'Siswa/Mahasiswa'? 'selected' : ''}}  @endif>Siswa/Mahasiswa</option>
                                    <option value="Wirausaha" @if($tab=='edit') {{ $data->pekerjaan == 'Wirausaha'? 'selected' : ''}}  @endif>Wirausaha</option>
                                    <option value="Wiraswasta" @if($tab=='edit') {{ $data->pekerjaan == 'Wiraswasta'? 'selected' : ''}}  @endif>Wiraswasta</option>
                                    <option value="TNI/POLRI" @if($tab=='edit') {{ $data->pekerjaan == 'TNI/POLRI'? 'selected' : ''}}  @endif>TNI/POLRI</option>
                                    <option value="PNS" @if($tab=='edit') {{ $data->pekerjaan == 'PNS'? 'selected' : ''}}  @endif>PNS</option>
                                    <option value="Lainnya" @if($tab=='edit') {{ $data->pekerjaan == 'Lainnya'? 'selected' : ''}}  @endif>Lainnya</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control show-tick" name="gol_darah">
                                    <option value="">-- Pilih Golongan Darah--</option>
                                    <option value="A" @if($tab=='edit') {{ $data->gol_darah == 'A'? 'selected' : ''}}  @endif>A</option>
                                    <option value="B" @if($tab=='edit') {{ $data->gol_darah == 'B'? 'selected' : ''}}  @endif>B</option>
                                    <option value="AB" @if($tab=='edit') {{ $data->gol_darah == 'AB'? 'selected' : ''}}  @endif>AB</option>
                                    <option value="O" @if($tab=='edit') {{ $data->gol_darah == 'O'? 'selected' : ''}}  @endif>O</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control show-tick" name="kewarganegaraan">
                                    <option value="">-- Pilih Golongan Darah--</option>
                                    <option value="WNI" @if($tab=='edit') {{ $data->kewarganegaraan == 'WNI'? 'selected' : ''}}  @endif>WNI</option>
                                    <option value="WNA" @if($tab=='edit') {{ $data->kewarganegaraan == 'WNA'? 'selected' : ''}}  @endif>WNA</option>
                                </select>
                            </div>
    
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" @if($tab=='edit') value="{{ $data->alamat }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="rt" class="form-control" placeholder="RT" @if($tab=='edit') value="{{ $data->rt }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="rw" class="form-control" placeholder="RW" @if($tab=='edit') value="{{ $data->rw }}"  @endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

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
    <script src="{{ asset('public/js/pages/forms/basic-form-elements.js') }}"></script>
@endpush