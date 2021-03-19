<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;


class CustomersController extends Controller
{
    //一覧画面
    public function getIndex()
    {
        $customers = Customer::all();
        return view('index', ['customer' => $customers]);
    }

    //検索
    public function search(Request $request)
    {
        //$last_kana = $request->input('last_kana');
        //$first_kana = $request->input('first_kana');
        //$gender = $request->input('gender');
        //$pref_id = $request->input('pref_id');
    }

    //新規登録画面の表示
    public function create()
    {
        return view ('create');
    }

    //詳細画面の表示
    public function detail ()
    {
        //$customer = Customer::findOrFail($id);
        return view ('detail');
    }

    //編集画面の表示
    public function edit ($id)
    {
        //$customer = Customer::findOrFail($id);
        return view ('edit');
    }

    /**
     * Undocumented function
     * 新規登録
     * @param Request $request
     * @return void
     */
    public function store (Request $request)
    {
        $customer = new Customer;
        $inputs = $request->input();
        unset($inputs['_token']);
        $customer->fill($inputs)->save();
        return redirect()->route('index');
    }

    /**
     * Undocumented function
     * 編集画面で更新
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update (Request $request, $id)
    {
        //$id = $request->id;
        //$customer = Customer::findOrFail($id);
        //$inputs = save();
        return redirect()->route('edit');
    }

    //詳細画面で削除
    public function delete (Request $request)
    {
        //$customer = Customer::findOrFail($id);

        //$customer->delete();
        return redirect()->route('index');

    }
}
