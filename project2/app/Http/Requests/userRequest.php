<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ad'=>'required|min:3|max:15',
            'soyad'=>'required|min:3|max:15',
            'email'=>'required',
            'password'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'ad.required'=>'Ad daxil etmədiniz',
            'ad.min'=>'Ad minimum 3 simvul olmalıdır',
            'ad.max'=>'Ad maksimim 15 simvul olmalıdır',

            'soyad.required'=>'Soyad daxil etmədiniz',
            'soyad.min'=>'Soyad minimum 3 simvul olmalıdır',
            'soyad.max'=>'Soyad maksimim 15 simvul olmalıdır',

            'email.required'=>'Email daxil etmədiniz',
            'password.required'=>'Parol daxil etmədiniz',
        ];
    }
}
