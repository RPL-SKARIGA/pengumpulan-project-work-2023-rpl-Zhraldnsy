<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model  
{
    protected $table = 'calon_siswa'; // Nama tabel yang sesuai

    protected $fillable = [
        'id_user',
        'pilihan_jurusan_1',
        'pilihan_jurusan_2',
        'nama_siswa',
        'nisn',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
        'pilihan_eskul_1',
        'pilihan_eskul_2',
        'nama_asal_sekolah',
        'kota',
        'provinsi',
        'alamat_sekolah',
        'nama_ayah',
        'no_telp_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',
        'nama_ibu',
        'no_telp_ibu',
        'pekerjaan_ibu',
        'alamat_ibu',
        'status_konfirmasi'
    ];


    public function jurusan(){
        return $this->belongsTo(Jurusan::class,'id','nama_jurusan');
    }

    public function jurusan1()
    {
        return $this->belongsTo(Jurusan::class, 'pilihan_jurusan_1');
    }

    public function jurusan2()
    {
        return $this->belongsTo(Jurusan::class, 'pilihan_jurusan_2');
    }

    public function eskul1()
    {
        return $this->belongsTo(Eskul::class, 'pilihan_eskul_1');
    }
    public function eskul2()
    {
        return $this->belongsTo(Eskul::class, 'pilihan_eskul_2');
    }
    
}
