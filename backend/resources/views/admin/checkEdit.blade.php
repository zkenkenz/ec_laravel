@extends('layouts.admin')

@section('title','商品削除　確認画面')
@section('content')
<div class="content">
    <h1 style="text-align:center;font-size:30px;">商品編集　確認画面</h1>
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
                <td>{{ $editId }}</td>
                <td>{{ $editName }}</td>
                <td><img src="{{asset('storage/image/'.$editImgpash)}}" alt="no-image"></td>
                <td>{{ $editDetail }}</td>
                <td>{{ $editPrice }}</td>
                <td>{{ $editStock }}</td>

            </tr>
        </div>

    </table>

    <form action="admin" method="post">
        @csrf
        <button type="submit" class="btn btn-primary" name="itemEdit" value="itemEdit">編集する</button>
        <input type="hidden" name="editId" value="{{ $editId }}">
        <input type="hidden" name="editName" value="{{ $editName }}">
        <input type="hidden" name="editImg" value="{{$editImgpash}}">
        <input type="hidden" name="editDetail" value="{{ $editDetail }}">
        <input type="hidden" name="editPrice" value="{{ $editPrice }}">
        <input type="hidden" name="editStock" value="{{ $editStock }}">
    </form>

</div>
@endsection