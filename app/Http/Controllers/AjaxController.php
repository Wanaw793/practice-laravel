<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class AjaxController extends Controller
{
    public function search(Request $request)
    {
        //都道府県IDを取得する
        $id = $request->pref_id;

        //市区町村のリストを検索する
        $cities = City::where('pref_id', '=',  id)->get();

        //レスポンスを返す
        return response()->json($cities);
    }
}
