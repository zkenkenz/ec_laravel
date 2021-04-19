@extends('layouts.admin')

@section('title','新規商品登録　確認画面')
@section('content')
<div class="content">
    <h1 style="text-align:center;font-size:30px;">新規商品登録　確認画面</h1>
    <table class="table table-bordered">

        <tr class="table-light">
            <th>商品名</th>
            <th>商品画像</th>
            <th>商品説明</th>
            <th>価格</th>
            <th>在庫</th>
        </tr>

        <div class="box">
            <tr>
                <td>{{ $registerName }}</td>
                <td><img src="{{asset('storage/image/'.$registerImgpash)}}" alt="no-image"></td>
                <td>{{ $registerDetail }}</td>
                <td>{{ $registerPrice }}</td>
                <td>{{ $registerStock }}</td>
            </tr>
        </div>
    </table>

    <form action="admin" method="post"　enctype="multipart/form-data">
        @csrf
        <button type="submit" class="btn btn-primary" name="itemRegister" value="itemRegister">登録する</button>
        <input type="hidden" name="registerName" value="{{ $registerName }}">
        <input type="hidden" name="registerImgpash" value="{{$registerImgpash}}">
        <input type="hidden" name="registerDetail" value="{{ $registerDetail }}">
        <input type="hidden" name="registerPrice" value="{{ $registerPrice }}">
        <input type="hidden" name="registerStock" value="{{ $registerStock }}">
    </form>

</div>

@endsection