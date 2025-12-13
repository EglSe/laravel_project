<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConferenceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

   // validation rules
    public function rules(): array
    {

        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'lecturers' => ['required', 'string'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            'address' => ['required', 'string', 'max:255'],
        ];
    }

    // users' messages
    public function messages()
    {
        return [
            'title.required' => 'Privalomas konferencijos pavadinimas.',

            'description.required' => 'Privalomas aprašymas.',

            'lecturers.required' => 'Privaloma nurodyti pranešėjus.',

            'date.required' => 'Privaloma nurodyti datą.',
            'date.date' => 'Neteisingas datos formatas.',

            'time.required' => 'Privalomas laikas',
            'time.date_format' => 'Neteisingas laiko formatas. Naudokite HH:MM.',

            'address.required' => 'Privalomas adresas.',

        ];
    }
}
