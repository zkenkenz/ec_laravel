@extends('layouts.admin')

@section('title','商品編集画面')
@section('content')
<div class="content">
    <h1 style="text-align:center;font-size:30px;">商品編集画面</h1>
    @if(isset($errMsg))
    <p style="text-align:center; color:red;">{{ $errMsg }}</p>
    @endif
    <form action="checkEdit" method="post" enctype="multipart/form-data">
        @csrf
        <table class="table table-bordered">

            <tr class="table-light">
                <th>商品ID</th>
                <th>商品名</th>
                <th>商品画像</th>
            </tr>
            <div class="box">
                <tr>
                    <td>{{ $editId }}</td>
                    <input type="hidden" name="editId" value="{{ $editId }}">
                    <td>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="editName" aria-describedby="NameHelp" value="{{ $editName }}" maxlength='255'>
                            <div id="NameHelp" class="form-text">商品名を記入してください。（255文字以内）</div>
                        </div>
                    </td>
                    <td>
                        <div>
                            <img src="{{asset('storage/image/'.$editImgpash )}}" alt="no-image">
                            <input type="file" accept=".png, .jpg, .jpeg, .pdf" name="editImg" maxlength='500'>
                            <input type="hidden" name="subEditImg" value="{{ $editImgpash }}">
                        </div>
                    </td>
                </tr>
            </div>

        </table>

        <table class="table table-bordered">

            <tr class="table-light">
                <th>商品説明</th>
            </tr>
            <div class="box">
                <tr>
                    <td>
                        <div class="mb-3">
                            <textarea class="form-control" name="editDetail" maxlength="255" aria-describedby="detailHelp"> {{ $editDetail }}</textarea>
                            <div id="detailHelp" class="form-text">商品の内容を記入してください。（255文字以内）</div>
                        </div>
                    </td>
                </tr>
            </div>

        </table>

        <table class="table table-bordered">

            <tr class="table-light">
                <th>価格</th>
                <th>在庫</th>
            </tr>
            <div class="box">
                <tr>
                    <td>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="editPrice" aria-describedby="priceHelp" value="{{ $editPrice }}">
                            <div id="priceHelp" class="form-text">商品価格を記入してください。<br>※価格は0以上を記入してください。</div>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="editStock" aria-describedby="stockHelp" value="{{ $editStock }}">
                            <div id="stockHelp" class="form-text">商品在庫を記入してください。<br>※在庫は0以上を記入してください。</div>
                        </div>
                    </td>
                </tr>
            </div>
        </table>

        <button type="submit" class="btn btn-primary" name="checkEdit" value="checkEdit">編集する</button>

    </form>


</div>

@endsection