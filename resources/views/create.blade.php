@extends('layout')

@section('title', '新規登録')
@section('content')
    <div class="container-fluid" style="margin-top: 50px; padding-left: 100px;padding-right: 100px;">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br/>
                @endforeach
            </div>
        @endif

        <form id="form" method="post" action="{{  route('store') }}">
            @csrf
            <div class="col-md-8 order-md-1">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="lastName">姓 <span class="badge badge-danger">必須</span></label>
                        <input type="text" class="form-control" name="last_name" placeholder="姓" value="{{ old('last_name') }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="firstName">名 <span class="badge badge-danger">必須</span></label>
                        <input type="text" class="form-control" name="first_name" placeholder="名" value="{{ old('first_name') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="lastKana">姓かな <span class="badge badge-danger">必須</span></label>
                        <input type="text" class="form-control" name="last_kana" placeholder="姓かな" value="{{ old('last_kana') }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="firstKana">名かな <span class="badge badge-danger">必須</span></label>
                        <input type="text" class="form-control" name="first_kana" placeholder="名かな" value="{{ old('birthday') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="gender">性別 <span class="badge badge-danger">必須</span></label>
                        <div class="col-sm-10 text-left">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="1" {{ old('gender') == 1 ? "checked" : "" }}>
                                <label class="form-check-label" for="inlineCheckbox1">男</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="2" {{ old('gender') == 2 ? "checked" : "" }}>
                                <label class="form-check-label" for="inlineCheckbox2">女</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="birthday">生年月日 <span class="badge badge-danger">必須</span></label>
                        <input type="date" class="form-control" name="birthday" placeholder="生年月日" value="{{ old('birthday') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label for="postCode">郵便番号 <span class="badge badge-danger">必須</span></label>
                        <input type="text" class="form-control" name="post_code" placeholder="郵便番号" value="{{ old('post_code') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="d-flex col-md-8 mb-2">
                        <div style=margin-right:20px;>
                            <label for="prefId">都道府県 <span class="badge badge-danger">必須</span></label>
                            <select id="pref_id" class="custom-select" name="pref_id" required>
                                @foreach($prefs as $pref)
                                    <option value="{{ $pref->id }}" {{ old("pref_id") == $pref->id ? "selected" : ""}}>{{ $pref->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="cityId">市区町村 <span class="badge badge-danger">必須</span></label>
                            <select id="city_id" class="custom-select" name="city_id" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="address">住所 <span class="badge badge-danger">必須</span></label>
                        <input type="text" class="form-control" name="address" placeholder="渋谷区道玄坂2丁目11-1" value="{{ old('address') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="building">建物名</label>
                        <input type="text" class="form-control" name="building" placeholder="Ｇスクエア渋谷道玄坂 4F" value="{{ old('building') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="tel">電話番号 <span class="badge badge-danger">必須</span></label>
                        <input type="tel" class="form-control" name="tel" placeholder="03-1234-5678" value="{{ old('tel') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="mobile">携帯番号 <span class="badge badge-danger">必須</span></label>
                        <input type="tel" class="form-control" name="mobile" placeholder="080-1234-5678" value="{{ old('mobile') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="email">メールアドレス <span class="badge badge-danger">必須</span></label>
                        <input type="email" class="form-control" name="email" placeholder="you@example.com" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="remarks">備考</label>
                        <textarea class="form-control" aria-label="With textarea" name="remarks">{{ old('remarks') }}</textarea>
                    </div>
                </div>
            </div>
        </form>
        <hr class="mb-4">
        <div class="form-group">
            <a  class="btn btn-secondary" href="{{ route('index') }}" style="width:150px">戻る</a>
            <button id="complete" type="button" class="btn btn-success" style="width:150px"><i class="fas fa-database pr-1"></i> 登録</button>
        </div>
    </div>

    <div id="complete-confirm" title="確認" style="display: none;">
        <p><span class="ui-icon ui-icon-info" style="float:left; margin:12px 12px 20px 0;"></span>登録しますか？</p>
    </div>
@endsection

@section('javascript')
    <script>
        $("#complete").click(function() {
            completeConfirm(function(result){
                if (result) {
                    $("form").submit();
                }
            });
        });

        function completeConfirm(response){
            notScreenRelease = true;
            var buttons = {};
            buttons['キャンセル'] = function(){$(this).dialog('close');response(false)};
            buttons['登録'] = function(){$(this).dialog('close');response(true)};

            $("#complete-confirm").dialog({
                show: {
                    effect: "drop",
                    duration: 500
                },
                hide: {
                    effect: "drop",
                    duration: 500
                },
                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: buttons
            });
        }
            //画面表示時、バリデーションエラー戻り時
            $(function() {
                setCities($("#pref_id").val());
            });

            //都道府県プルダウン選択時
            $("#pref_id").change(function() {
                setCities($("#pref_id").val());
            });

            //市区町村プルダウンの設定
            function setCities(prefId) {
                if (!prefId) {
                    $("#city_id").empty();
                    return;
                }

                $.ajax({
                    url:"{{  route('ajax') }}",
                    type:"get",
                    datatype:"json",
                    data: {
                        "pref_id": prefId
                    }
                })

                .done(function(data) {
                    $("#city_id").empty();
                    //oldから市区町村IDを取得
                    let cityId = {{ old('city_id') }};
                    data.forEach(function(item, index){
                        //市区町村IDによってselected付けるか分岐する
                        if
                        $("#city_id").append($('<option>').text(item.name).attr('value', item.id));
                    });
                });
            }
    </script>
@endsection
