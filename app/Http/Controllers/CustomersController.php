<?php

namespace App\Http\Controllers;

use DB;
use App\Customer;
use Illuminate\Http\Request;
use App\Pref;


class CustomersController extends Controller
{
    //一覧画面
    public function getIndex()
    {
        $customers = Customer::all();
        $prefs = Pref::all();
        return view('index', ['customers' => $customers], ['prefs' => $prefs]);
    }

    //検索
    public function search(Request $request)
    {
        $inputs = $request->input();

        $query = Customer::query();

        if (!empty($inputs['last_kana'])) {
            $query->where('last_kana', 'Like', '%'. $inputs['last_kana']. '%');
        }

        if (!empty($inputs['first_kana'])) {
            $query->where('first_kana', 'Like', '%'. $inputs['first_kana']. '%');
        }

        if (!empty($inputs['gender'])) {
            $query->where('gender', '=', $inputs[1])->orwhere('gender', '=', $inputs[2]);
        }

        if (!empty($inputs['pref_id'])) {
            $query->where('pref_id', '=',  $inputs['pref_id']);
        }
        //$gender = $request->input('gender');

        $customers = $query->get();
        $prefs = Pref::all();
        return view('index', ['customers' => $customers], ['prefs' => $prefs]);
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
        $inputs = $request->input();
        unset($inputs['_token']);
        DB::transaction(function () use ($inputs) {
            $customer = new Customer;
            $customer->fill($inputs)->save();
        });
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
        $inputs = $request->input();
        unset($inputs['_token']);
        $customer = Customer::find($request->id);
        DB::transaction(function () use ($customer,$inputs) {
            $customer->fill($inputs)->save();
        });
        return redirect()->route('index');
    }

    //詳細画面で削除
    public function delete(Request $request)
    {
        $customer = Customer::findOrFail($request->id);
        DB::transaction(function () use ($customer) {
            $customer->delete();
        });
        return redirect()->route('index');

    }
}
