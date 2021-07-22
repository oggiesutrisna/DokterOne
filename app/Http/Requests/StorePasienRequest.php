<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePasienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nosurat' => 'required|max:255',
            'nama' => 'required|max:255',
            'sampling_time' => 'required|max:255',
            'dob' => 'required|max:255',
            'nomor_pid' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'nationality' => 'required|max:255',
            'jenis_pemeriksaan' => 'required|max:255',
            'result' => 'required|max:255',
        ];
    }
}
