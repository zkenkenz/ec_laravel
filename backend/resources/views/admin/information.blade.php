@extends('layouts.admin')

@section('title','ユーザー情報一覧')

@section('content')

<div class="content">
    <h1 style="text-align:center;font-size:30px;">ユーザー情報一覧</h1>

    <table class="table table-striped">

        <tr>
            <th>購入者氏名</th>
            <th>購入商品</th>
            <th>商品画像</th>
            <th>購入時刻</th>
            <th></th>


        </tr>
        @foreach ($informations as $information )
        @foreach($items as $item)
        @if($information->item_id == $item->id)
        <div class="box">

            <tr>
                <td>{{ $information->name }}</td>
                <td>{{ $item->name }}</td>
                <td><img src="{{asset('storage/image/'.$item->imgpash )}}" alt="no-image"></td>
                <td>{{ $information->created_at }}</td>
                <form action="detail" method="post">
                    @csrf
                    <td>
                        <input type="hidden" name="informationCreate_at" value="{{ $information->created_at }}">
                        <input type="hidden" name="itemId" value="{{ $information->item_id }}">
                        <button type="submit" class="btn btn-link">詳細を見る</button>
                    </td>
                </form>
            </tr>

        </div>

        @endif
        @endforeach
        @endforeach
    </table>

</div>
@endsection