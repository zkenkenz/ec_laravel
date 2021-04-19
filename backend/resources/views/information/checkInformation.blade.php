@extends('layouts.app')

@section('title','入力情報確認画面')

@section('header')
<ul class="navbar-nav me-auto mb-2 mb-sm-0">
    <li class="nav-item">
        <form action="item" method="post" name="items">
            @csrf
            <input type="hidden" name="items" value="商品一覧">
            <a class="nav-link" href="javascript:items.submit()">ホーム</a>
        </form>
    </li>
    <li class="nav-item">
        <form action="mycart" method="post" name="myCart">
            @csrf
            <input type="hidden" name="myCart" 　value="カートの中身">
            <a class="nav-link" href="javascript:myCart.submit()">カートの中身</a>
        </form>
    </li>
</ul>
@endsection


@section('content')
<div class="content">
    <h1 style="text-align:center;font-size:30px;">購入手続き</h1>
    <h2 style="font-size:20px;">購入商品</h2>
    @foreach( $buyItems as $buyItem )
    <div class="description">
        <p><span>商品名<br></span>{{ $buyItem->name }}</p>
        <img src="{{asset('storage/image/'.$buyItem->imgpash )}}" alt="no-image" class="image_size">
        <p><span>商品説明<br></span>{{ $buyItem->detail }}</p>
        <p><span>価格<br></span>¥{{ $buyItem->price }}</p>
        <p><span>在庫<br></span>{{ $buyItem->stock }}個</p>
    </div>
    @endforeach

    <div class="confirm">
        <label class="col-sm-3 col-form-label">お名前</label>
        <div class="col-sm-9">
            <p>{{ $name }}</p>
        </div>
    </div>

    <div class="confirm">
        <label class="col-sm-3 col-form-label">電話番号</label>
        <div class="col-sm-9">
            <p>{{ $tel }}</p>
        </div>
    </div>

    <div class="confirm">
        <label class="col-sm-3 col-form-label">郵便番号</label>
        <div class="col-sm-9">
            <p>{{ $postalCode }}</p>
        </div>
    </div>

    <div class="confirm">
        <label class="col-sm-3 col-form-label">ご自宅住所</label>
        <div class="col-sm-9">
            <p>{{ $address }}</p>
        </div>
    </div>

    <div class="confirm">
        <label class="col-sm-3 col-form-label">メールアドレス</label>
        <div class="col-sm-9">
            <p>{{ $email }}</p>
        </div>
    </div>

    <div class="alert" style="color:crimson;">
        <div class="col-sm-9">
            <p>※現在お支払い方法は『代引きのみ』の対応となっております</p>
        </div>
    </div>

    <form action="buySuccess" method="post">
        @csrf
        <div class="text-center my-5">
            <button type="submit" class="btn btn-primary">購入する</button>
        </div>
        <input type="hidden" name="name" value="{{ $name }}">
        <input type="hidden" name="tel" value="{{ $tel }}">
        <input type="hidden" name="postalCode" value="{{ $postalCode }}">
        <input type="hidden" name="address" value="{{ $address }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <input type="hidden" name="itemId" value=" {{ $buyItem->item_id }}">
        <input type="hidden" name="itemName" value=" {{ $buyItem->name }}">
        <input type="hidden" name="imgpash" value=" {{ $buyItem->imgpash }}">
        <input type="hidden" name="stock" value=" {{ $buyItem->stock }}">
        <input type="hidden" name="price" value=" {{ $buyItem->price }}">

    </form>

</div>

@endsection