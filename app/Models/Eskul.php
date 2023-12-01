<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    use HasFactory;
    protected $table = 'eskul';
    protected $fillable = [
        'nama_eskul'
        ];


    public function calonSiswa1()
    {
        return $this->hasOne(CalonSiswa::class, 'pilihan_eskul_1');
    }

    public function calonSiswa2()
    {
        return $this->hasOne(CalonSiswa::class, 'pilihan_eskul_2');
    }
}
