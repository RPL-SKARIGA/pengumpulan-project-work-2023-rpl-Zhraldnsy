<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaBaru extends Model
{
    use HasFactory; 

    protected $table = 'siswa';
    protected $fillable = [
        'nis',
        'id_calon_siswa'
        ];


        public function calonsiswa()
    {
        return $this->belongsTo(CalonSiswa::class, 'id_calon_siswa');
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
