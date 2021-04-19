@extends('layouts.app')

@section('title','商品一覧')

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
<form class="d-flex" action="items.search" method="get">
    @csrf
    <input type="text" name="keyword" placeholder="Search">
    <input type="submit" value="検索">
</form>
@endsection

@section('content')
<div class="content">
    <h1 style="text-align:center;font-size:30px;">商品詳細</h1>
    <div class="description">
        <p><span>商品名<br></span>{{ $itemDetails->name }}</p>
        <img src="{{asset('storage/image/'.$itemDetails->imgpash )}}" alt="no-image" class="image_size">
        <p><span>商品説明<br></span>{{ $itemDetails->detail }}</p>
        <p><span>価格<br></span>¥{{ $itemDetails->price }}</p>
        <p><span>在庫<br></span>{{ $itemDetails->stock }}個</p>
    </div>
    <div class="cart">
    @if($itemDetails->stock > 0)
        <form action="mycart" method="post">
            @csrf
            <input type="submit" name="addCart" value="カートに入れる">
            <input type="hidden" name="itemId" value="{{ $itemDetails->id }}">
            <input type="hidden" name="itemName" value="{{ $itemDetails->name }}">
            <input type="hidden" name="itemImg" value="{{ $itemDetails->imgpash }}">
            <input type="hidden" name="itemDetail" value="{{ $itemDetails->detail }}">
            <input type="hidden" name="itemPrice" value="{{ $itemDetails->price }}">
            <input type="hidden" name="itemStock" value="{{ $itemDetails->stock }}">
        </form>
    @else
        <p>在庫がありません</p>
    @endif       
    </div>
</div>
@endsection