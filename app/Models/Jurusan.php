<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';
    protected $fillable = [
        'nama_jurusan'
        ];
        public function calonSiswa1()
        {
            return $this->hasOne(CalonSiswa::class, 'pilihan_jurusan_1');
        }
    
        public function calonSiswa2()
        {
            return $this->hasOne(CalonSiswa::class, 'pilihan_jurusan_2');
        }
        
}
