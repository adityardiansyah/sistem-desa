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
                        @endif DATA KELAHIRAN
                    </h2>
                    <div class="header-dropdown m-r--5">
                        <a href="" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
                <div class="body">
                    @if ($tab == 'new')
                    <form action="{{ route('data_kelahiran.store', ['tab'=>'new', 'id'=>'all'])}}" method="POST">
                    @else
                    <form action="{{ route('data_kelahiran.store', ['tab'=>'edit', 'id'=>$id])}}" method="POST">
                    @endif
                        @csrf
                        <div class="row">
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="no_kk" class="form-control" placeholder="Nomor KK" @if($tab == 'edit') value="{{ $data->no_kk }}"  @endif>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="nik" class="form-control" placeholder="NIK" @if($tab == 'edit') value="{{ $data->nik }}"  @endif>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" @if($tab == 'edit') value="{{ $data->data_penduduk->nama }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" @if($tab == 'edit') value="{{ $data->tempat_lahir }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" @if($tab == 'edit') value="{{ $data->tgl_lahir }}"  @endif>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="hari" class="form-control" placeholder="Hari Lahir" @if($tab == 'edit') value="{{ $data->hari }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="time" name="pukul" class="form-control" placeholder="Pukul Lahir" @if($tab == 'edit') value="{{ $data->pukul }}"  @endif>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="jenis_kelahiran" class="form-control" placeholder="Jenis Kelahiran" @if($tab == 'edit') value="{{ $data->jenis_kelahiran }}"  @endif>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="anak_ke" class="form-control" placeholder="Anak Ke" @if($tab == 'edit') value="{{ $data->anak_ke }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="berat_bayi" class="form-control" placeholder="Berat Bayi (kg)" @if($tab == 'edit') value="{{ $data->berat_bayi }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="panjang_bayi" class="form-control" placeholder="Panjang Bayi (cm)" @if($tab == 'edit') value="{{ $data->panjang_bayi }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nik_ayah" class="form-control" placeholder="NIK Ayah" @if($tab == 'edit') value="{{ $data->nik_ayah }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nik_ibu" class="form-control" placeholder="NIK Ibu" @if($tab == 'edit') value="{{ $data->nik_ibu }}"  @endif>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-3">
                                <select class="form-control show-tick" name="jk">
                                    <option value="">-- Pilih Jenis Kelamin--</option>
                                    <option value="Laki-Laki" @if($tab == 'edit') {{ $data->data_penduduk->jk == 'Laki-Laki'? 'selected' : ''}}  @endif>Laki-Laki</option>
                                    <option value="Perempuan" @if($tab == 'edit') {{ $data->data_penduduk->jk == 'Perempuan'? 'selected' : ''}}  @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control show-tick" name="agama">
                                    <option value="">-- Pilih Agama--</option>
                                    <option value="Islam" @if($tab == 'edit') {{ $data->data_penduduk->agama == 'Islam'? 'selected' : ''}}  @endif>Islam</option>
                                    <option value="Kristen" @if($tab == 'edit') {{ $data->data_penduduk->agama == 'Kristen'? 'selected' : ''}}  @endif>Kristen</option>
                                    <option value="Katolik" @if($tab == 'edit') {{ $data->data_penduduk->agama == 'Katolik'? 'selected' : ''}}  @endif>Katolik</option>
                                    <option value="Budha" @if($tab == 'edit') {{ $data->data_penduduk->agama == 'Budha'? 'selected' : ''}}  @endif>Budha</option>
                                    <option value="Hindu" @if($tab == 'edit') {{ $data->data_penduduk->agama == 'Hindu'? 'selected' : ''}}  @endif>Hindu</option>
                                    <option value="Konghucu" @if($tab == 'edit') {{ $data->data_penduduk->agama == 'Konghucu'? 'selected' : ''}}  @endif>Konghucu</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control show-tick" name="gol_darah">
                                    <option value="">-- Pilih Golongan Darah--</option>
                                    <option value="A" @if($tab == 'edit') {{ $data->data_penduduk->gol_darah == 'A'? 'selected' : ''}}  @endif>A</option>
                                    <option value="B" @if($tab == 'edit') {{ $data->data_penduduk->gol_darah == 'B'? 'selected' : ''}}  @endif>B</option>
                                    <option value="AB" @if($tab == 'edit') {{ $data->data_penduduk->gol_darah == 'AB'? 'selected' : ''}}  @endif>AB</option>
                                    <option value="O" @if($tab == 'edit') {{ $data->data_penduduk->gol_darah == 'O'? 'selected' : ''}}  @endif>O</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-control show-tick" name="kewarganegaraan">
                                    <option value="">-- Pilih Kewarganegaraan--</option>
                                    <option value="WNI" @if($tab == 'edit') {{ $data->data_penduduk->kewarganegaraan == 'WNI'? 'selected' : ''}}  @endif>WNI</option>
                                    <option value="WNA" @if($tab == 'edit') {{ $data->data_penduduk->kewarganegaraan == 'WNA'? 'selected' : ''}}  @endif>WNA</option>
                                </select>
                            </div>
    
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" @if($tab == 'edit') value="{{ $data->data_penduduk->alamat }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="rt" class="form-control" placeholder="RT" @if($tab == 'edit') value="{{ $data->data_penduduk->rt }}"  @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="rw" class="form-control" placeholder="RW" @if($tab == 'edit') value="{{ $data->data_penduduk->rw }}"  @endif>
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