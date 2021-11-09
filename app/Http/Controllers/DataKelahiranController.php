<?php

namespace App\Http\Controllers;

use App\DataKelahiran;
use App\DataPenduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataKelahiranController extends Controller
{
    public function __construct()
    {
        Session::put('menu_active', 'data_kelahiran');
    }
    public function index(Request $request)
    {
        $data = DataKelahiran::orderBy('id', 'desc');

        if (Session::get('hak_akses') === 3) {
            $data = $data->where('nik_ayah', Session::get('useractive')->nik);
        }
        
        $data = $data->paginate(20);

        return view('admin.data_kelahiran.index', compact('data'));
    }

    public function form($tab = 'new', $id = 'all')
    {
        $data = [];
        if ($tab === 'new') {
            return view('admin.data_kelahiran.info', compact('data','tab', 'id'));
        } elseif ($tab === 'edit') {
            $data = DataKelahiran::find($id);

            return view('admin.data_kelahiran.info', compact('data', 'tab', 'id'));
        }elseif($tab == 'detail'){

        }
    }

    public function store(Request $request, $tab = 'new', $id = 'all')
    {
        if ($tab === 'new') {
            $request->merge([
                'no_kk' => Session::get('useractive')->no_kk
            ]);
            $penduduk = DataPenduduk::create($request->all());
            
            $request->merge([
                'data_penduduk_id' => $penduduk->id
            ]);
            $data = DataKelahiran::create($request->all());
            $content = 'Berhasil Ditambahkan!';
        } elseif ($tab == 'edit') {
            $data = DataKelahiran::find($request->id)->update($request->all());
            $content = 'Berhasil Diedit!';
        }

        return redirect()->route('data_kelahiran.index')
        ->with('message', ['type' => 'success', 'content' => $content]);
    }

    public function delete($id)
    {
        if ($id) {
            $data = DataKelahiran::find($id);
            $data->delete();
        }
        return redirect()->route('data_kelahiran.index')
        ->with('message', ['type' => 'success', 'content' => 'Data Berhasil Dihapus!']);
    }

    public function confirm($type, $id)
    {
        $data = DataKelahiran::find($id);
        if ($type === 'terima') {
            $data->status = 1;
        } elseif ($type === 'tolak') {
            $data->status = 2;
        } elseif ($type === 'verifikasi') {
            $data->nik_kades = Session::get('useractive')->nik;
        }
        $content = 'Status Berhasil diubah!';
        $data->save();

        return redirect()->route('data_kelahiran.index')
        ->with('message', ['type' => 'success', 'content' => $content]);
    }

    public function print($id)
    {
        $data = DataKelahiran::select(
            'data_kelahiran.*',
            'data_penduduk.nama as nama_bayi',
            'data_penduduk.tempat_lahir as tempat_lahir_bayi',
            'data_penduduk.tgl_lahir as tgl_lahir_bayi',
            'data_penduduk.jk as jk_bayi',
            'data_penduduk.alamat as alamat_bayi'
        )
            ->leftJoin('data_penduduk', 'data_penduduk.id', 'data_kelahiran.data_penduduk_id')
            ->where('data_kelahiran.id', $id)->first();

        $kades = DataPenduduk::where('nik', $data->nik_kades)->first();
        $data->nama_kades = $kades->nama;

        $ayah = DataPenduduk::where('nik', $data->nik_ayah)->first();
        $data->nama_ayah = $ayah->nama;
        $data->pekerjaan_ayah = $ayah->pekerjaan;
        $data->alamat_ayah = $ayah->alamat;

        $ibu = DataPenduduk::where('nik', $data->nik_ibu)->first();
        $data->nama_ibu = $ibu->nama;
        $data->pekerjaan_ibu = $ibu->pekerjaan;
        $data->alamat_ibu = $ibu->alamat;

        
        return view('admin.data_kelahiran.print', compact('data'));
    }
}
