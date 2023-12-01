<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJurusanRequest extends FormRequest
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
            'nama_jurusan' => 'required|string|max:50|unique:jurusan'     
        ];
    }

    public function messages(){
        return [
            'nama_jurusan.required' => 'Nama Jurusan wajib diisi',
            'nama_jurusan.string' => 'Nama Jurusan harus berupa teks',
            'nama_jurusan.unique' => 'Nama Jurusan sudah ada',
            'nama_jurusan.max' => 'Nama Jurusan maksimal 50 karakter',    
            ];
    }
}
