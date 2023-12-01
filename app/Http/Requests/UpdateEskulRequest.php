<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEskulRequest extends FormRequest
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
            'nama_eskul' => 'required|string|max:50|unique:eskul'     
        ];
    }

    public function messages(){
        return [
            'nama_eskul.required' => 'Nama ekstrakurikuler wajib diisi',
            'nama_eskul.string' => 'Nama ekstrakurikuler harus berupa teks',
            'nama_eskul.unique' => 'Nama ekstrakurikuler sudah ada',
            'nama_eskul.max' => 'Nama ekstrakurikuler maksimal 50 karakter',    
            ];
    }
}
