<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
                        'title'        => 'required|string|max:255',
                        'summary'      => 'required|string',
                        'requirements' => 'nullable|string',
                        'price'        => 'required|numeric|min:0',
                        'start_on'     => 'required|date|after_or_equal:today',
                        'status'       => 'required|in:active,new,inactive,blocked',
                        'account_id'   => 'required|exists:accounts,id',
                        'coverPreview' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'title'        => 'required|string|max:255',
                        'summary'      => 'required|string',
                        'requirements' => 'nullable|string',
                        'price'        => 'required|numeric|min:0',
                        'start_on'     => 'required|date',
                        'status'       => 'required|in:active,new,inactive,blocked',
                        'account_id'   => 'required|exists:accounts,id',
                        'coverPreview' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
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
