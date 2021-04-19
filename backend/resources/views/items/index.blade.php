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
    <h1 style="text-align:center;font-size:30px;">商品一覧</h1>
    <div class="wrapper">
        @foreach ($items as $item )
        <div class="product">
            <img src="{{asset('storage/image/'.$item->imgpash )}}" class="image_size" style="border:solid 1px rgb(0,0,0)">
            <form action="itemDetail" method="post">
                @csrf
                <input type="hidden" name="itemId" value=" {{ $item->id }}">
                <h2 class="item_name" style="font-size:20px;"><input type="submit" value="{{ $item->name }}"></h2>
            </form>
            <h3 class="price" style="font-size: 18px;">¥{{ $item->price }}</h3>
        </div>
        @endforeach
    </div>

</div>

{{$items->appends(request()->input())->links('vendor.pagination.default')}}
@endsection