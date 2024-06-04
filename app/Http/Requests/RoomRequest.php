<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
        'room_name' => 'required|string|max:255',
        'room_type_id' => 'required|integer|exists:room_types,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        'description' => 'nullable|string',
        'room_number' => 'required|unique:rooms,room_number,' . $this->route('room'),
        'status' => 'required|in:available,booked,pending'
    ];
    }
}
