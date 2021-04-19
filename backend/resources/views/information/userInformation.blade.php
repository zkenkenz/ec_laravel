@extends('layouts.app')

@section('title','購入手続き画面')

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
    @if(isset($errMsg))
    <p style = "color:red; text-align:center">{{ $errMsg }}</p>
    @endif
    <form action="checkInformation" method="post">

        @csrf
        <div class="form-row">
            <label class="col-sm-3 col-form-label">お名前 <span class="badge badge-danger">必須</span></label>
            <div class="col-sm-9">
                <p>
                    <input type="text" name="name" autocomplete="name" class="form-control" placeholder="お名前" required  maxlength='255' />
                </p>
            </div>
        </div>

        <div class="form-row">
            <label class="col-sm-3 col-form-label">電話番号 <span class="badge badge-danger">必須</span></label>
            <div class="col-sm-9">
                <p>
                    <input type="tel" name="tel" autocomplete="tel" class="form-control" placeholder="電話番号" required maxlength='255' />
                </p>
            </div>
        </div>

        <div class="form-row">
            <label class="col-sm-3 col-form-label">郵便番号 <span class="badge badge-danger">必須</span></label>
            <div class="col-sm-9">
                <p>
                    <input type="text" name="postalCode" autocomplete="postal-code" class="form-control" placeholder="郵便番号" required maxlength='255' />
                </p>
            </div>
        </div>

        <div class="form-row">
            <label class="col-sm-3 col-form-label">ご自宅住所 <span class="badge badge-danger">必須</span></label>
            <div class="col-sm-9">
                <p>
                    <input type="text" name="address" class="form-control" placeholder="ご自宅住所" required  maxlength='255'/>
                </p>
            </div>
        </div>

        <div class="form-row">
            <label class="col-sm-3 col-form-label">メールアドレス <span class="badge badge-danger">必須</span></label>
            <div class="col-sm-9">
                <p>
                    <input type="email" name="email" autocomplete="email" class="form-control" placeholder="メールアドレス" required  maxlength='255' />
                </p>
            </div>
        </div>

        <div class="alert" style="color:crimson;">
            <div class="col-sm-9">
                <p>※現在お支払い方法は『代引きのみ』の対応となっております</p>
            </div>
        </div>

        <div class="text-center my-5">
            <button type="submit" class="btn btn-primary">確認する</button>
        </div>

        <input type="hidden" name="buyItem" value="{{ $buyItem->created_at }}">

    </form>
</div>
@endsection