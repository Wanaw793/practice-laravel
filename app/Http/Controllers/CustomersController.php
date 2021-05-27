<?php

namespace App\Http\Controllers;

use DB;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerSearchRequest;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Pref;
use App\City;

/**
 * Class CustomersController
 *
 * @package App\Http\Controllers
 */
class CustomersController extends Controller
{
    /**
     * 一覧画面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getIndex()
    {
        $customers = Customer::paginate(20);
        $prefs = Pref::all();
        $inputs = [
            'last_kana' => '',
            'first_kana' => '',
            'gender1' => null,
            'gender2' => null,
            'pref_id' => null,
        ];
        return view('index', ['customers' => $customers], ['prefs' => $prefs])->with('inputs', $inputs);
    }

    //検索
    public function search(CustomerSearchRequest $request)
    {
        $inputs = $request->input();

        $query = Customer::query();

        if (!empty($inputs['last_kana'])) {
            $query->where('last_kana', 'Like', '%'. $inputs['last_kana']. '%');
        }

        if (!empty($inputs['first_kana'])) {
            $query->where('first_kana', 'Like', '%'. $inputs['first_kana']. '%');
        }

        if (!empty($inputs['gender1']) || !empty($inputs['gender2'])) {
            $genders = [];
            if (!empty($inputs['gender1'])) {
                $genders[] = $inputs['gender1'];
            }
            if (!empty($inputs['gender2'])) {
                $genders[] = $inputs['gender2'];
            }
            $query->whereIn('gender', $genders);
        }

        if (!empty($inputs['pref_id'])) {
            $query->where('pref_id', '=', $inputs['pref_id']);
        }

        $customers = $query->get();
        $prefs = Pref::all();

        return view('index', ['customers' => $customers], ['prefs' => $prefs])->with('inputs', $inputs);
    }

    //新規登録画面の表示
    public function create(Request $request)
    {
        $customers = Customer::all();
        $prefs = Pref::all();
        return view('create', ['customers' => $customers], ['prefs' => $prefs]);
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
    public function store(CustomerStoreRequest $request)
    {
        $inputs = $request->input();
        unset($inputs['_token']);
        DB::transaction(function () use ($inputs) {
            $customer = new Customer;
            $customer->fill($inputs)->save();
        });
        return redirect()->route('index')->with('store', true);
    }

    /**
     * Undocumented function
     * 編集画面で更新
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(CustomerUpdateRequest $request)
    {
        $inputs = $request->input();
        unset($inputs['_token']);
        $customer = Customer::find($request->id);
        DB::transaction(function () use ($customer, $inputs) {
            $customer->fill($inputs)->save();
        });
        return redirect()->route('index')->with('update', true);
    }

    //詳細画面で削除
    public function delete(Request $request)
    {
        $customer = Customer::findOrFail($request->id);
        DB::transaction(function () use ($customer) {
            $customer->delete();
        });
        return redirect()->route('index')->with('delete', true);
    }
}
