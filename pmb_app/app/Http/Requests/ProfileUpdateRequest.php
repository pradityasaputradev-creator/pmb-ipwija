<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'nik' => ['nullable', 'regex:/^[0-9]+$/', 'min:16', 'max:20'],
            'tanggal_lahir' => ['nullable', 'date'],
            'no_hp' => ['nullable', 'regex:/^[0-9+\-\s]+$/', 'max:20'],
            'alamat' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * Custom validation messages for Indonesian profile fields.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nik.regex' => 'NIK hanya boleh berisi angka.',
            'nik.min' => 'NIK minimal 16 digit.',
            'nik.max' => 'NIK maksimal 20 karakter.',
            'no_hp.regex' => 'Nomor HP hanya boleh berisi angka, spasi, atau tanda hubung.',
            'no_hp.max' => 'Nomor HP maksimal 20 karakter.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'alamat.max' => 'Alamat maksimal 1000 karakter.',
        ];
    }
}