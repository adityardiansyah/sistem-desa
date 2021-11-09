<?php

namespace App\Http\Controllers;

use App\DataPenduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataPendudukController extends Controller
{
    public function __construct() {
        Session::put('menu_active', 'data_penduduk');
    }
    
    public function index(Request $request)
    {
        $data = DataPenduduk::orderBy('id','desc')->paginate(20);

        return view('admin.data_penduduk.index', compact('data'));
    }

    public function form($tab = 'new', $id = 'all')
    {
        $data = [];
        if($tab === 'new'){
            return view('admin.data_penduduk.info', compact('data','tab','id'));
        }elseif($tab === 'edit'){
            $data = DataPenduduk::find($id);
            
            return view('admin.data_penduduk.info', compact('data','tab','id'));
        }elseif($tab === 'cetak'){
            $data = DataPenduduk::whereNotIn('id', [1,4])->get();

            return view('admin.data_penduduk.cetak', compact('data'));
        }
    }

    public function store(Request $request, $tab = 'new', $id = 'all')
    {
        if($tab === 'new'){
            $data = DataPenduduk::create($request->all());
            $content = 'Berhasil Ditambahkan!';
        }elseif($tab == 'edit'){
            $data = DataPenduduk::find($request->id)->update($request->all());
            $content = 'Berhasil Diedit!';
        }

        return redirect()->route('data_penduduk.index')
        ->with('message', ['type' => 'success', 'content' => $content]);
    }

    public function delete($id)
    {
        if($id){
            $data = DataPenduduk::find($id);
            $data->delete();
        }
        return redirect()->route('data_penduduk.index')
        ->with('message', ['type' => 'success', 'content' => 'Data Berhasil Dihapus!']);
    }
}
