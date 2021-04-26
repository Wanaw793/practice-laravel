@extends('layout')

@section('title', '編集')
@section('content')
            <div class="container-fluid" style="margin-top: 50px; padding-left: 100px;padding-right: 100px;">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br/>
                        @endforeach
                    </div>
                @endif

                <form id="form" method="post" action="{{  route('update', ['id' => $customer->id]) }}">
                    @csrf
                    <div class="col-md-8 order-md-1">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="lastName">姓 <span class="badge badge-danger">必須</span></label>
                                <input type="text" class="form-control" name="last_name" placeholder="姓" value="{{ old('last_name', $customer->last_name) }}" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="firstName">名 <span class="badge badge-danger">必須</span></label>
                                <input type="text" class="form-control" name="first_name" placeholder="名" value="{{ old('first_name', $customer->first_name) }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="lastKana">姓かな <span class="badge badge-danger">必須</span></label>
                                <input type="text" class="form-control" name="last_kana" placeholder="姓かな" value="{{ old('last_kana', $customer->last_kana) }}" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="firstKana">名かな <span class="badge badge-danger">必須</span></label>
                                <input type="text" class="form-control" name="first_kana" placeholder="名かな" value="{{ old('first_kana', $customer->first_kana) }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="gender">性別 <span class="badge badge-danger">必須</span></label>
                                <div class="col-sm-10 text-left">
                                    <div class="form-check form-check-inline"></div>
                                        <input class="form-check-input" type="radio" name="gender" value="1" {{ old("gender", $customer->gender) == 1 ? 'checked' : "" }}>
                                        <label class="form-check-label" for="inlineCheckbox1">男</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="2" {{ old("gender", $customer->gender) == 2 ? 'checked' : "" }}>
                                        <label class="form-check-label" for="inlineCheckbox2">女</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="birthday">生年月日 <span class="badge badge-danger">必須</span></label>
                                <input type="date" class="form-control" name="birthday" placeholder="生年月日" value="{{ old('birthday', $customer->birthday->format('Y-m-d')) }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <label for="postCode">郵便番号 <span class="badge badge-danger">必須</span></label>
                                <input type="text" class="form-control" name="post_code" placeholder="郵便番号" value="{{ old('post_code', $customer->post_code) }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-flex col-md-8 mb-2">
                                <div style=margin-right:20px;>
                                    <label for="prefId">都道府県 <span class="badge badge-danger">必須</span></label>
                                    <select class="custom-select d-block w-100" name="pref_id" required>
                                        @foreach($prefs as $pref)
                                        <option value="{{ $pref->id }}" {{ old("pref_id", $customer->pref_id) == $pref->id ? "selected" : ""}}>{{ $pref->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="cityId">市区町村 <span class="badge badge-danger">必須</span></label>
                                    <select id="city_id" class="custom-select" name="city_id" required>
                                        @foreach($cities as $city)
                                        <option value=""></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="address">住所 <span class="badge badge-danger">必須</span></label>
                                <input type="text" class="form-control" name="address" placeholder="渋谷区道玄坂2丁目11-1" value="{{ old('address', $customer->address) }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="building">建物名</label>
                                <input type="text" class="form-control" name="building" placeholder="Ｇスクエア渋谷道玄坂 4F" value="{{ old('building', $customer->building) }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="tel">電話番号 <span class="badge badge-danger">必須</span></label>
                                <input type="tel" class="form-control" name="tel" placeholder="03-1234-5678" value="{{ old('tel', $customer->tel) }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="mobile">携帯番号 <span class="badge badge-danger">必須</span></label>
                                <input type="tel" class="form-control" name="mobile" placeholder="080-1234-5678" value="{{ old('mobile', $customer->mobile) }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="email">メールアドレス <span class="badge badge-danger">必須</span></label>
                                <input type="email" class="form-control" name="email" placeholder="you@example.com" value="{{ old('email', $customer->email) }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="remarks">備考</label>
                                <textarea class="form-control" aria-label="With textarea" name="remarks">{{ old('remarks', $customer->remarks) }}</textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <hr class="mb-4">
                <div class="form-group">
                    <a  class="btn btn-secondary" href="{{  route('index', ['id' => $customer->id]) }}" style="width:150px">戻る</a>
                    <button id="complete" type="button" class="btn btn-info" style="width:150px"><i class="fas fa-database pr-1"></i> 更新</button>
                </div>
            </div>
        </main>

        <div id="complete-confirm" title="確認" style="display: none;">
            <p><span class="ui-icon ui-icon-info" style="float:left; margin:12px 12px 20px 0;"></span>更新しますか？</p>
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
                buttons['更新'] = function(){$(this).dialog('close');response(true)};

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

        $(function() {
                setCities($("#pref_id").val());
         });

         $("#pref_id").change(function() {
            setCities($("#pref_id").val());
        });

        function setCities(prefId) {
                if (!prefId) {
                    $("#city_id").empty();
                    return;
                }

                $("#city_id").empty();
//


                $("#city_id").append($('<option>').text("新宿区").attr('value', 1));
                $("#city_id").append($('<option>').text("渋谷区").attr('value', 2));
            }

        $(function() {
            $('#pref_id').on("change",function(){
                $.ajax({
                    url: 'update',
                    type: 'POST',
                )}
        });
        </script>
@endsection
