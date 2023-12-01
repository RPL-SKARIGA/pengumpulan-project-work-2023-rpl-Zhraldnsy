<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCalonSiswaRequest;
use App\Http\Requests\UpdateCalonSiswaRequest;
use App\Models\SiswaBaru;
use Auth;
use App\Models\CalonSiswa;
use App\Models\Eskul;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class CalonSiswaController extends Controller
{

  public function home(){
    return view('home');
  }
      public function index(){
        $calonsiswa = CalonSiswa::all();
        $eskul = Eskul::all();
        $jurusan = Jurusan::all(); 
        $casis = CalonSiswa::all()->where('id_user', Auth::user()->id)->count();
        return view('form', compact('calonsiswa', 'eskul', 'jurusan', 'casis'));
      }

     public function store(StoreCalonSiswaRequest $request)
    {
      $data = [
        'id_user' => $request->id_user,
        'pilihan_jurusan_1' =>$request->pilihan_jurusan_1,
        'pilihan_jurusan_2' =>$request->pilihan_jurusan_2,
        'nama_siswa' =>$request->nama_siswa,
        'nisn'=>$request->nisn,
        'gender'=>$request->gender,
        'tempat_lahir'=>$request->tempat_lahir,
        'tanggal_lahir'=>$request->tanggal_lahir,
        'pilihan_eskul_1'=>$request->pilihan_eskul_1,
        'pilihan_eskul_2'=>$request->pilihan_eskul_2,
        'nama_asal_sekolah' =>$request->nama_asal_sekolah,
        'kota'=>$request->kota,
        'provinsi'=>$request->provinsi,
        'alamat_sekolah'=>$request->alamat_sekolah,
        'nama_ayah'=>$request->nama_ayah,
        'no_telp_ayah'=>$request->no_telp_ayah,
        'pekerjaan_ayah'=>$request->pekerjaan_ayah,
        'alamat_ayah'=>$request->alamat_ayah,
        'nama_ibu'=>$request->nama_ibu,
        'no_telp_ibu'=>$request->no_telp_ibu,
        'pekerjaan_ibu'=>$request->pekerjaan_ibu,
        'alamat_ibu'=>$request->alamat_ibu,
        'status_konfirmasi' => 'Belum Diterima',
    ];
         CalonSiswa::create($data);

        return redirect()->route('home.home')->with('success', 'Data Calon Siswa berhasil disimpan.');
    }

    //dashboard admin
    public function show(){
        $calonsiswa = CalonSiswa::all()->where('status_konfirmasi','Belum Diterima');
        $eskul = Eskul::all();
        $jurusan = Jurusan::all(); 
        return view('admin/casis', compact('calonsiswa', 'eskul', 'jurusan'));
    }

    public function delete($id)
    {
      $calonsiswabaru = CalonSiswa::find($id);
      $calonsiswabaru->status_konfirmasi = 'Ditolak';
      $calonsiswabaru->update();
      return redirect()->route('casis.show')->with('success', 'Calon Siswa berhasil Ditolak.');
    }

    public function edit($id)
{
    $data = CalonSiswa::find($id);
    $jurusan1 = Jurusan::all();
    $jurusan2 = Jurusan::all();
    $eskul1 = Eskul::all();
    $eskul2 = Eskul::all();
    return view('admin/edit-casis', compact('data', 'jurusan1','jurusan2', 'eskul1','eskul2'));
}
    public function update(Request $request, $id)
{
    $calonsiswa = CalonSiswa::find($id);
    $calonsiswa->update($request->all());

    return redirect()->route('casis.show')->with('successedit', 'Calon Siswa berhasil edit.');
}


    public function konfirmasi(){
    $calonsiswa = CalonSiswa::with(['jurusan1', 'jurusan2','eskul1','eskul2'])->where('status_konfirmasi', 'Belum Diterima')->get();
    $eskul = Eskul::all();
    $jurusan = Jurusan::all();
    return view('admin/casiskonfirmasi', compact('calonsiswa', 'eskul', 'jurusan'));
    }



    public function konfirmasiproses($id) {
      $calonsiswabaru = CalonSiswa::find($id);
      $calonsiswabaru->status_konfirmasi = 'Sudah Di Terima';
      $calonsiswabaru->update();
      $calonsiswa = CalonSiswa::with(['jurusan1', 'jurusan2','eskul1','eskul2'])->get();
      $eskul = Eskul::all();
      $jurusan = Jurusan::all();
      $data = [
        "nis" => "3332".$calonsiswabaru->id,
        "id_calon_siswa" => $calonsiswabaru->id,
      ];
      SiswaBaru::create($data);
      return redirect()->route('siswabaru.index')->with([
        'calonsiswa' => $calonsiswa,
        'eskul' => $eskul,
        'jurusan' => $jurusan,
        'successkonfirmasi' => 'Konfirmasi berhasil dilakukan. Selamat datang di sekolah kami!'
    ]);
    }

    public function status(Request $request) {
      $data = CalonSiswa::with(['jurusan1', 'eskul1', 'eskul2'])->where("id_user", Auth::user()->id)->get()->first();
      if ($data) {
        $nama = $data->nama_siswa;
        $status = $data->status_konfirmasi;
      return view("status", compact("data", "nama","status"));
      }
      return view("status", compact("data"));
    }

    public function detail($id) {
      $data = CalonSiswa::with(['jurusan1','jurusan2', 'eskul1', 'eskul2'])->where("id", $id)->get()->first();
      return view("admin/detail-casis", compact("data"));
    }
}

