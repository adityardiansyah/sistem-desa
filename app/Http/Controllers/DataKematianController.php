<?php

namespace App\Http\Controllers;

use App\DataKematian;
use App\DataPenduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataKematianController extends Controller
{
    public function __construct()
    {
        Session::put('menu_active', 'data_kematian');
    }

    public function index(Request $request)
    {
        $data = DataKematian::orderBy('id', 'desc');

        if (Session::get('hak_akses') === 3) {
            $data = $data->where('nik_pengurus', Session::get('useractive')->nik);
        }

        $data = $data->paginate(20);

        foreach ($data as $key => $value) {
            $penduduk = DataPenduduk::where('nik', $value->nik)->first();
            $value->nama  = $penduduk->nama;
            $value->agama  = $penduduk->agama;
        }

        return view('admin.data_kematian.index', compact('data'));
    }

    public function form($tab = 'new', $id = 'all', Request $request)
    {
        $data = [];
        if ($tab === 'new') {
            return view('admin.data_kematian.info', compact('data', 'tab', 'id'));
        } elseif ($tab === 'edit') {
            $data = DataKematian::find($id);

            return view('admin.data_kematian.info', compact('data', 'tab', 'id'));
        }
    }

    public function store(Request $request, $tab = 'new', $id = 'all')
    {
        if ($tab === 'new') {
            $cek = DataPenduduk::where('nik', $request->nik)->first();
            if(!empty($cek)){
                $request->merge(['nik_pengurus' => Session::get('useractive')->nik]);
                $data = DataKematian::create($request->all());
                $content = 'Berhasil Ditambahkan!';
                $type = 'success';
            } else {
                $content = 'NIK Tidak ditemukan, mohon isi dengan benar!';
                $type = 'error';

                return redirect()->back()
                ->with('message', ['type' => $type, 'content' => $content]);
            }
        } elseif ($tab == 'edit') {
            $data = DataKematian::find($request->id)->update($request->all());
            $content = 'Berhasil Diedit!';
            $type = 'success';
        } 

        return redirect()->route('data_kematian.index')
        ->with('message', ['type' => $type, 'content' => $content]);
    }

    public function confirm($type, $id)
    {
        $data = DataKematian::find($id);
        if ($type === 'terima') {
            $data->status = 1;
        } elseif($type === 'tolak') {
            $data->status = 2;
        } elseif($type === 'verifikasi'){
            $data->nik_kades = Session::get('useractive')->nik;
        }
        $content = 'Status Berhasil diubah!';
        $data->save();

        return redirect()->route('data_kematian.index')
        ->with('message', ['type' => 'success', 'content' => $content]);
    }

    public function delete($id)
    {
        if ($id) {
            $data = DataKematian::find($id);
            $data->delete();
        }
        return redirect()->route('data_kematian.index')
        ->with('message', ['type' => 'success', 'content' => 'Data Berhasil Dihapus!']);
    }

    public function print($id)
    {
        $data = DataKematian::select(
            'data_kematian.*','data_penduduk.nama as nama_pengurus',
            'data_penduduk.tempat_lahir as tempat_lahir_pengurus',
            'data_penduduk.tgl_lahir as tgl_lahir_pengurus',
            'data_penduduk.pekerjaan as pekerjaan_pengurus',
            'data_penduduk.alamat as alamat_pengurus'
        )
        ->leftJoin('data_penduduk', 'data_penduduk.nik','data_kematian.nik_pengurus')
        ->where('data_kematian.id', $id)->first();

        $kades = DataPenduduk::where('nik', $data->nik_kades)->first();
        $data->nama_kades = $kades->nama;

        $wafat = DataPenduduk::where('nik', $data->nik)->first();
        $data->nama = $wafat->nama;
        $data->jk = $wafat->jk;
        $data->tgl_lahir = $wafat->tgl_lahir;
        $data->tempat_lahir = $wafat->tempat_lahir;
        $data->kewarganegaraan = $wafat->kewarganegaraan;
        $data->status_perkawinan = $wafat->status_perkawinan;
        $data->pekerjaan = $wafat->pekerjaan;
        $data->alamat = $wafat->alamat;

        return view('admin.data_kematian.print', compact('data'));
    }
}
