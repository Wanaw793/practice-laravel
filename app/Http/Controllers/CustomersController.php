<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //一覧画面
    public function getIndex() {

        return view('index');
    }

    //検索
    public function search(Request $request)
    {
        $last_kana = $request->input('last_kana');
        $first_kana = $request->input('first_kana');
        $gender = $request->input('gender');
        $pref_id = $request->input('pref_id');
    }
}
