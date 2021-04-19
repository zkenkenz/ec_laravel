@extends('layouts.app')

@section('title','カートの中身')

@section('header')
<ul class="navbar-nav me-auto mb-2 mb-sm-0">
    <li class="nav-item">
        <form action="item" method="post" name="items">
            @csrf
            <input type="hidden" name="items" value="商品一覧">
            <a class="nav-link" href="javascript:items.submit()">ホーム</a>
        </form>
    </li>
</ul>
<form class="d-flex" action="items.search" method="get">
    @csrf
    <input type="text" name="keyword" placeholder="Search">
    <input type="submit" value="検索">
</form>
@endsection
@section('content')
<div class="content">
    <h1 style="text-align:center;font-size:40px;">カート</h1>
    <p class="text-center">{{ $message }}</p>
    @foreach( $carts as $cart )
    <div class="name">
        <p><span>商品名<br></span>{{ $cart->name }}</p>
    </div>
    <div class="description">
        <img src="{{asset('storage/image/'.$cart->imgpash )}}" alt="no-image" class="image_size">
        <p><span>商品説明<br></span>{{ $cart->detail }}</p>
        <p><span>価格<br></span>¥{{ $cart->price }}</p>
        <p><span>在庫<br></span>{{ $cart->stock }}個</p>
    </div>
    <form action="mycart" method="post">
        @csrf
        <input type="submit" name="deleteCartItem" value="削除">
        <input type="hidden" name="created_at" value="{{ $cart->created_at }}">
    </form>
    <form action="userInformation" method="post">
        @csrf
        <input type="submit" value="購入手続きへ">
        <input type="hidden" name="buyItem" value="{{ $cart->created_at }}">
    </form>
    @endforeach

</div>
@endsection