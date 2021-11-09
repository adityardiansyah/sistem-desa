<?php

namespace App\Http\Controllers;

use App\DataPenduduk;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('admin.login');
    }

    public function daftar(Request $request)
    {
        return view('admin.daftar');
    }

    public function proses_daftar(Request $request)
    {
        $cek = DataPenduduk::where('nik',$request->nik)->first();
        if(!empty($cek)){
            $generate_password = '12345678';
            $user = User::create([
                'nik' => $request->nik,
                'password' => Hash::make($generate_password),
                'hak_akses_id' => 3
            ]);
            $cek->user_id = $user->id;
            $cek->save();

            Session::put('type','daftar_masyarakat');
            Session::put('hak_akses', 3);
            Session::put('useractive', $cek);

            return view('admin.dashboard');
            // return redirect()->route('auth.dashboard');
        }else{
            return redirect()->back();
        }
    }

    public function proses_login(Request $request)
    {
        if(Auth::attempt(['nik' => $request->nik, 'password' => $request->password])){
            $user = User::where('nik', $request->nik)->first();
            $data = DataPenduduk::where('nik', $request->nik)->first();
            
            Session::put('hak_akses', $user->hak_akses_id);
            Session::put('useractive', $data);

            if($user->hak_akses_id === 3){
                return redirect()->route('auth.dashboard');
            }else{
                return redirect()->route('admin.index')
                ->with('message', ['type' => 'success', 'content'=>'Berhasil Login!']);
            }
            
        }else{
            // Session::put('message', "Gagal");
            return redirect()->back()
            ->with('message', ['type' => 'danger', 'content' => 'Gagal Login, NIK atau Password anda salah!']);
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('auth.login')
        ->with('message', ['type' => 'success', 'content' => 'Berhasil Logout!']);
    }
}
