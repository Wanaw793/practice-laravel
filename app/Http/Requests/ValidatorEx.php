<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;

class ValidatorEx extends FormRequest
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
            //'last_name' => 'required|string|max:50', //姓
            //'first_name' => 'required|max:50', //名
            //'last_kana' => 'required|max:50', //姓かな
            //'first_kana' => 'required|max:50', //名かな
            //'gender' => 'required|integer', //性別
            //'birthday' => 'required|date', //生年月日
            //'post_code' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/'], //郵便番号
            //'pref_id' => 'required|integer', //都道府県
            //'address' => 'required|max:80', //住所
            //'building' => 'max:80', //建物名
            //'tel' => ['required', 'regex:/^0\d{1,3}-\d{1,4}-\d{4}$/'], //電話番号
            //'mobile' => ['required', 'regex:/^(070|080|090)-\d{4}-\d{4}$/'], //携帯番号
            //'email' => 'unique:customers,email|max:80', //メールアドレス

        ];
    }

    public function message()
    {
        return [
            //'required' => '必須',
        ];
    }
}
