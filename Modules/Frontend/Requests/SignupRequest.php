<?php


namespace Modules\Frontend\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignupRequest extends FormRequest
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
            'email' => 'required|email|unique:visa_users' ,
            'full_name' => 'required',
            'phone' => 'required|numeric|min:8|unique:visa_users',
            'password' => ['required','confirmed',Password::min(8)],
        ];
    }
}
