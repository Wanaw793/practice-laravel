<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Pref;


class CustomersController extends Controller
{
    //一覧画面
    public function getIndex()
    {
        $customers = Customer::all();
        return view('index', ['customers' => $customers]);
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
        return view('create');
    }

    //詳細画面の表示
    public function detail(Request $request)
    {
        $customer = Customer::findOrFail($request->id);
        return view('detail', ['customer' => $customer]);
    }

    //編集画面の表示
    public function edit(Request $request)
    {
        $prefs = Pref::all();
        $customer = Customer::find($request->id);
        return view('edit', ['customer' => $customer], ['prefs' => $prefs]);
    }

    /**
     * Undocumented function
     * 新規登録
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
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
    public function update(Request $request)
    {
        $customer = Customer::find($request->id);
        unset($customer['_token']);
        $customer->fill($request->all())->save();
        return redirect()->route('index');
    }

    //詳細画面で削除
    public function delete(Request $request)
    {
        //$customer = Customer::findOrFail($id);

        //$customer->delete();
        return redirect()->route('index');

    }
}
