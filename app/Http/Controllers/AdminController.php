<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\Eskul;
use App\Models\Jurusan;
use App\Models\SiswaBaru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input("search");
        $countjur = Jurusan::count();
        $counteskul = Eskul::count();
        $countcasis = CalonSiswa::where("status_konfirmasi", "Belum Diterima")->count();
        $countsiswa = SiswaBaru::count();
        $sisbar = SiswaBaru::with(['calonsiswa', 'jurusan1', 'jurusan2', 'eskul1', 'eskul2'])->where('nis','LIKE','%'.$search.'%')
        ->orWhereHas('calonsiswa', function ($query) use ($search) {
            $query->where('nama_siswa','LIKE','%'.$search.'%');
        })->get();
        return view('admin.dashboard', compact('countjur', 'counteskul', 'countcasis', 'countsiswa', 'sisbar'));
    }

    public function showlogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($infologin)) {
            return redirect('/dashboard')->with('successlogin', 'Anda Berhasil Login');
        } else {
            return redirect('/loginadmin')->with('error', 'Username dan Password yang dimasukan tidak valid');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/loginadmin')->with('logout', 'Anda Berhasil Logout');
    }
}
