<?php

namespace App\Http\Controllers;

use App\Customer;
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
        //$last_kana = $request->input('last_kana');
       // $first_kana = $request->input('first_kana');
       // $gender = $request->input('gender');
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
    public function edit (Request $request)
    {
        //$customer = Customer::findOrFail($id);
        return view ('edit');
    }

    /**
     * Undocumented function
     *新規登録
     * @param Request $request
     * @return void
     */
    public function store (Request $request)
    {
        //$inputs = $request->input();
       // unset($input['_token']);
       // Customer::create($inputs);

        return redirect()->route('index');
    }

    //編集画面で更新
    public function update (Request $request)
    {
        //$id = $request->id;
        //$customer = Customer::findOrFail($id);
        return redirect()->route('index');
    }

    //詳細画面で削除
    public function delete (Request $request)
    {
        //$customer = Customer::findOrFail($id);

        //$customer->delete();
        return redirect()->route('index');

    }
}
