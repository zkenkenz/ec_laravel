@extends('layouts.admin')

@section('title','購入者情報詳細')
@section('content')
<div class="content">
    <h1 style="text-align:center;font-size:30px;">購入者情報詳細</h1>

    <table class="table table-bordered">

        <tr class="table-light">
            <th>購入者氏名</th>
            <th>電話番号</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>メールアドレス</th>
            <th>購入時間</th>


        </tr>
        @foreach ($userInformations as $userInformation )
        <div class="box">

            <tr>
                <td>{{ $userInformation->name }}</td>
                <td>{{ $userInformation->tel }}</td>
                <td>{{ $userInformation->postalCode }}</td>
                <td>{{ $userInformation->address }}</td>
                <td>{{ $userInformation->email }}</td>
                <td>{{ $userInformation->created_at }}</td>

            </tr>

        </div>

        @endforeach
    </table>


    <table class="table table-bordered">
        <tr class="table-light">
            <th>商品ID</th>
            <th>購入商品</th>
            <th>商品画像</th>
            <th>価格</th>


        </tr>
        @foreach ($userInformations as $userInformation )
        @foreach($items as $item)
        @if($userInformation->item_id == $item->id)
        <div class="box">

            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td><img src="{{asset('storage/image/'.$item->imgpash)}}" alt="no-image"></td>
                <td>{{ $item->price }}</td>

            </tr>

        </div>
        @endif
        @endforeach
        @endforeach

    </table>

</div>
@endsection