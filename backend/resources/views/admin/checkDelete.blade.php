@extends('layouts.admin')

@section('title','商品削除　確認画面')
@section('content')
<div class="content">
    <h1 style="text-align:center;font-size:30px;">商品削除　確認画面</h1>
    <table class="table table-bordered">

        <tr class="table-light">
            <th>商品ID</th>
            <th>商品名</th>
            <th>商品画像</th>
            <th>商品説明</th>
            <th>価格</th>
            <th>在庫</th>
        </tr>
        <div class="box">
            <tr>
                <td>{{ $deleteId }}</td>
                <td>{{ $deleteName }}</td>
                <td><img src="{{asset('storage/image/'.$deleteImgpash)}}" alt="no-image"></td>
                <td>{{ $deleteDetail }}</td>
                <td>{{ $deletePrice }}</td>
                <td>{{ $deleteStock }}</td>

            </tr>
        </div>

    </table>

    <form action="admin" method="post">
        @csrf
        <button type="submit" class="btn btn-primary" name="itemDelete" value="itemDelete">削除する</button>
        <input type="hidden" name="deleteId" value="{{ $deleteId }}">
    </form>

</div>
@endsection