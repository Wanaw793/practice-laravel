<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
            'id' => 'required',
            'last_name' => 'required|max:50',
            'first_name' => 'required|max:50',
            'last_kana' => 'required|max:50',
            'first_kana' => 'required|max:50',
            'gender' => 'required|integer',
            'birthday' => 'required|date',
            'post_code' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/'],
            'pref_id' => 'required|integer',
            'address' => 'required|max:80',
            'building' => 'max:80',
            'tel' => ['required', 'regex:/^0\d{1,3}-\d{1,4}-\d{4}$/'],
            'mobile' => ['required', 'regex:/^(070|080|090)-\d{4}-\d{4}$/'],
            'email' => 'required|email|max:80|unique_email',
        ];
    }
}
