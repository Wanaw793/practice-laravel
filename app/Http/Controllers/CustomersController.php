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

    //新規登録画面の表示
    public function create()
    {
        return view ('create');
    }

    //詳細画面の表示
    public function detail ()
    {
        return view ('detail');
    }

    //編集画面の表示
    public function edit ()
    {
        return view ('edit');
    }

    //新規登録画面で登録
    public function store ()
    {
        return view
    }

    //編集画面で更新
    public function update ()
    {

    }

    //詳細画面で削除
    public function delete ()
    {

    }
}
