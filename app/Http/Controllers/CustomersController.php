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
    public function edit ($id)
    {
        $customer = Customer::findOrFail($id);
        return view ('edit');
    }

    //新規登録画面で登録
    public function store ()
    {
        $inputs = \Request::all();
        Customer::create($inputs);

        return view ('index');
    }

    //編集画面で更新
    public function update (Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        return redirect ('index');
    }

    //詳細画面で削除
    public function delete ($id)
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();
        return redirect ('index');

    }
}
