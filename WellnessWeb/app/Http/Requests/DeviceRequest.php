<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name' => 'required|max:255',
                    'summary' => 'required',
                    'status' => 'required',
                    'avatar' => 'mimes:jpg,jpeg,png|max:500',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|max:255',
                    'summary' => 'required',
                    'status' => 'required',
                    'avatar' => 'mimes:jpg,jpeg,png|max:500',
                ];
            }
            default:
                break;
        }

        return [
            //
        ];
    }
}
