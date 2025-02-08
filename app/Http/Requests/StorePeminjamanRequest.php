<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeminjamanRequest extends FormRequest
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
    public function rules()
    {
        return [
            'siswa' => 'required|exists:siswa,nis',
            'pb_harus_kembali_tgl' => 'required|date',
            'data_pinjam' => 'required|array',
            'data_pinjam.*' => 'string|exists:barang,br_kode',
        ];
    }
}
