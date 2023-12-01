<?php

namespace App\Http\Controllers;

use App\Models\SiswaBaru;
use App\Http\Requests\StoreSiswaBaruRequest;
use App\Http\Requests\UpdateSiswaBaruRequest;

use Illuminate\Http\Request;
class SiswaBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input("search");
        $siswabaru = SiswaBaru::with(["calonsiswa", "jurusan1"])
        ->where('nis','LIKE','%'.$search.'%')
        ->orWhereHas('calonsiswa', function ($query) use ($search) {
            $query->where('nama_siswa','LIKE','%'.$search.'%');
        })
        ->get();
        return view('admin/siswabaru', compact('siswabaru'));
    }
}
