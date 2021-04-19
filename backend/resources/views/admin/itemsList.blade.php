@extends('layouts.admin')

@section('title','管理者用　商品一覧登録画面')

@section('content')

<div class="content">
    <h1 style="text-align:center;font-size:20px;">{{ $message }}</h1>

    <table class="table table-striped">

        <tr>
            <th>商品ID</th>
            <th>商品名</th>
            <th>商品画像</th>
            <th>商品説明</th>
            <th>価格</th>
            <th>在庫</th>
            <th></th>
            <th></th>
        </tr>

        @foreach ($items as $item )
        <div class="box">
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td><img src="{{asset('storage/image/'.$item->imgpash)}}" alt="no-image"></td>
                <td>{{ $item->detail }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->stock }}</td>
                <td>
                    <form action="checkDelete" method="post">
                        @csrf
                        <button type="submit" class="btn-outline-primary">削除</button>
                        <input type="hidden" name="deleteId" value="{{ $item->id }}">
                        <input type="hidden" name="deleteName" value="{{ $item->name }}">
                        <input type="hidden" name="deleteImg" value="{{ $item->imgpash }}">
                        <input type="hidden" name="deleteDetail" value="{{ $item->detail }}">
                        <input type="hidden" name="deletePrice" value="{{ $item->price }}">
                        <input type="hidden" name="deleteStock" value="{{ $item->stock }}">
                    </form>
                    <form action="edit" method="post">
                        @csrf
                        <button type="submit" class="btn-outline-primary" name="edit" value="edit">編集</button>
                        <input type="hidden" name="editId" value="{{ $item->id }}">
                        <input type="hidden" name="editName" value="{{ $item->name }}">
                        <input type="hidden" name="editImg" value="{{ $item->imgpash }}">
                        <input type="hidden" name="editDetail" value="{{ $item->detail }}">
                        <input type="hidden" name="editPrice" value="{{ $item->price }}">
                        <input type="hidden" name="editStock" value="{{ $item->stock }}">
                    </form>
                </td>
            </tr>
        </div>
        @endforeach

        {{$items->appends(request()->input())->links('vendor.pagination.default')}}

    </table>
    <p style="text-align:center; margin-top:50px">新商品登録</p>
    @if(isset($errMsg))
    <p style="text-align:center; color:red;">{{ $errMsg }}</p>
    @endif
    <form action="checkRegister" method="post" enctype="multipart/form-data">
        @csrf
        <table class="table table-bordered">

            <tr class="table-info">
                <th>商品名</th>
                <th>商品画像</th>
            </tr>
            <div class="box">
                <tr>
                    <td>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="itemName" aria-describedby="NameHelp" placeholder="商品名" maxlength='255'>
                            <div id="NameHelp" class="form-text">商品名を記入してください。（255文字以内）</div>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="file" id="File" accept=".png, .jpg, .jpeg, .pdf" name="itemImg" maxlength='500'>
                        </div>
                    </td>
                </tr>
            </div>

        </table>

        <table class="table table-bordered">

            <tr class="table-info">
                <th>商品説明</th>
            </tr>
            <div class="box">
                <tr>
                    <td>
                        <div class="mb-3">
                            <textarea class="form-control" name="itemDetail" 　maxlength="255" 　aria-describedby="detailHelp" placeholder="商品説明" maxlength='255'></textarea>
                            <div id="detailHelp" class="form-text">商品の内容を記入してください。（255文字以内）</div>
                        </div>
                    </td>
                </tr>
            </div>

        </table>

        <table class="table table-bordered">

            <tr class="table-info">
                <th>価格</th>
                <th>在庫</th>
            </tr>
            <div class="box">
                <tr>
                    <td>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="itemPrice" aria-describedby="priceHelp" placeholder="価格">
                            <div id="priceHelp" class="form-text">商品価格を記入してください。<br>※価格は0以上を記入してください。</div>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="itemStock" aria-describedby="stockHelp" placeholder="在庫">
                            <div id="stockHelp" class="form-text">商品在庫を記入してください。<br>※在庫は0以上を記入してください。</div>
                        </div>
                    </td>
                </tr>
            </div>
        </table>

        <button type="submit" class="btn btn-primary">登録確認</button>

    </form>


    

</div>

@endsection