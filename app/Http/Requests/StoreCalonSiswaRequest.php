<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCalonSiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_siswa' => 'required|string|max:100',
            'gender' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'nisn' => 'required|numeric',
            'pilihan_jurusan_1' => 'required|exists:jurusan,id',
            'pilihan_jurusan_2' => 'required|exists:jurusan,id',
            'pilihan_eskul_1' => 'required|exists:eskul,id',
            'pilihan_eskul_2' => 'required|exists:eskul,id',
            'nama_asal_sekolah' => 'required|string|max:50',
            'kota' => 'required|string|max:20',
            'provinsi' => 'required|string|max:30',
            'alamat_sekolah' => 'required|string|max:100',
            'nama_ayah' => 'required|string|max:255',
            'no_telp_ayah' => 'required|string|max:12',
            'pekerjaan_ayah' => 'required|string|max:255',
            'alamat_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'no_telp_ibu' => 'required|string|max:12',
            'pekerjaan_ibu' => 'required|string|max:255',
            'alamat_ibu' => 'required|string|max:255',
        ];
    }

    public function messages(){
        return [
            'id_user.required'=> 'Kolom ID USER Wajib Di isi',
            'id_user.string'=> 'Inputan ID User Harus Berupa Text',

            'nama_siswa.required'=> 'Kolom Nama Wajib Di isi',
            'nama_siswa.string'=> 'Inputan Harus Berupa Text',
            'nama_siswa.max'=> 'Nama Lengkap Tidak Boleh Melebii 100 Karakter',

            'gender.required' => 'Jenis kelamin harus dipilih.',
            'gender.in' => 'Jenis kelamin harus Laki-Laki (L) atau Perempuan (P).',

            'tempat_lahir.required'=> 'Kolom Kota Lahir Wajib Di isi',
            'tempat_lahir.string'=> 'Inputan Harus Berupa Text',
            'tempat_lahir.max'=> 'Nama Lengkap Tidak Boleh Melebii 20 Karakter',

            'tanggal_lahir.required'=> 'Kolom Tanggal Lahir Wajib Dipilih',
            'tanggal_lahir.date'=> 'Tanggal Lahir Wajib Inputan Tanggal',

            'nisn.required'=> 'Kolom NISN Wajib Di isi',
            'nisn.numeric'=> 'Inputan Harus Numeric',

            'pilihan_jurusan_1.required'=> 'Pilihan Jurusan 1 Wajib Di Pilih',
            'pilihan_jurusan_2.required'=> 'Pilihan Jurusan 2 Wajib Di Pilih',

            'pilihan_eskul_1.required'=> 'Pilihan Ekstrakurikuler 1 Wajib Di Pilih',
            'pilihan_eskul_2.required'=> 'Pilihan Ekstrakurikuler 2 Wajib Di Pilih',

            'nama_asal_sekolah.required'=> 'Kolom Nama Asal Sekolah Wajib Di isi',
            'nama_asal_sekolah.string'=> 'Inputan Harus Berupa Text',
            'nama_asal_sekolah.max'=> 'Nama Asal Sekolah Tidak Boleh Melebihi 50 Karakter',
            'kota.required'=> 'Kolom Kota Wajib Di isi',
            'kota.string'=> 'Inputan Harus Berupa Text',
            'kota.max'=> 'Kota Tidak Boleh Melebihi 20 Karakter',
            'provinsi.required'=> 'Kolom Provinsi Wajib Di isi',
            'provinsi.string'=> 'Inputan Harus Berupa Text',
            'provinsi.max'=> 'Provinsi Tidak Boleh Melebihi 20 Karakter',
            'alamat_sekolah.required'=> 'Kolom Alamat Sekolah Wajib Di isi',
            'alamat_sekolah.string'=> 'Inputan Harus Berupa Text',
            'alamat_sekolah.max'=> 'Alamat Sekolah Tidak Boleh Melebihi 100 Karakter',

            'nama_ayah.required'=> 'Kolom Nama Ayah Wajib Di isi',
            'nama_ayah.string'=> 'Inputan Harus Berupa Text',
            'nama_ayah.max'=> 'Nama Ayah Tidak Boleh Melebihi 255 Karakter',
            'no_telp_ayah.required'=>'Kolom Nomor Telepon Ayah Wajib Di isi',
            'no_telp_ayah.numeric'=> 'Inputan Harus Berupa Angka',
            'no_telp_ayah.max'=> 'Nomor Telepon Ayah Tidak Boleh Melebihi 12 Angka',
            'pekerjaan_ayah.required'=> 'Kolom Nama Ayah Wajib Di isi',
            'pekerjaan_ayah.string'=> 'Inputan Harus Berupa Text',
            'pekerjaan_ayah.max'=> 'Nama Ayah Tidak Boleh Melebihi 255 Karakter',
            'alamat_ayah.required'=> 'Kolom Nama Ayah Wajib Di isi',
            'alamat_ayah.string'=> 'Inputan Harus Berupa Text',
            'alamat_ayah.max'=> 'Nama Ayah Tidak Boleh Melebihi 255 Karakter',

            'nama_ibu.required'=> 'Kolom Nama Ibu Wajib Di isi',
            'nama_ibu.string'=> 'Inputan Harus Berupa Text',
            'nama_ibu.max'=> 'Nama Ibu Tidak Boleh Melebihi 255 Karakter',
            'no_telp_ibu.required'=>'Kolom Nomor Telepon Ibu Wajib Di isi',
            'no_telp_ibu.numeric'=> 'Inputan Harus Berupa Angka',
            'no_telp_ibu.max'=> 'Nomor Telepon Ibu Tidak Boleh Melebihi 12 Angka',
            'pekerjaan_ibu.required'=> 'Kolom Nama Ibu Wajib Di isi',
            'pekerjaan_ibu.string'=> 'Inputan Harus Berupa Text',
            'pekerjaan_ibu.max'=> 'Nama Ibu Tidak Boleh Melebihi 255 Karakter',
            'alamat_ibu.required'=> 'Kolom Nama Ibu Wajib Di isi',
            'alamat_ibu.string'=> 'Inputan Harus Berupa Text',
            'alamat_ibu.max'=> 'Nama Ibu Tidak Boleh Melebihi 255 Karakter'
        ];
    }
}
