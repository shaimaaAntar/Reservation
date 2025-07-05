<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required|date|unique:reservations|after_or_equal:today',
            'city_id' => 'required|exists:cities,id',
            'doctor_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',

        ];
    }
}
