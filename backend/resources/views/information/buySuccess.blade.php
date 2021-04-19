@extends('layouts.app')

@section('title','購入完了')

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
    <div style="text-align:center;">
        <h1　style="font-size:30px;">ご購入ありがとうございました</h1>
    </div>
</div>
@endsection