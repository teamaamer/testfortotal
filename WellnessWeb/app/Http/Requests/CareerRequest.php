<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest
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
                    'title' => 'required|max:255',
                    'summary' => 'required',
                    'status' => 'required',
                    'salary_range' => 'required|numeric',   // must be a number
                    'account_id'   => 'required|exists:accounts,id', // must exist in accounts table
                    'city' => 'required',
                    'country' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'title' => 'required|max:255',
                    'summary' => 'required',
                    'status' => 'required',
                    'salary_range' => 'required|numeric',   // must be a number
                    'account_id'   => 'required|exists:accounts,id', // must exist in accounts table
                    'city' => 'required',
                    'country' => 'required',
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
