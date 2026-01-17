<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
                    'avatar' => 'mimes:jpg,jpeg,png|max:500',
                    'role' => 'required',
                    'status' => 'required',
                    'password' => 'required',
                    'email' => 'required|email|max:255|unique:users'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|max:255',
                    'avatar' => 'mimes:jpg,jpeg,png|max:500',
                    'role' => 'required',
                    'status' => 'required',
                    'email' => 'required|email|max:255'
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
