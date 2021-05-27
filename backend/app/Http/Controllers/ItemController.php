<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Item;



class ItemController extends Controller
{
    public function itemsList()
    {

        /**
         * 商品一覧を表示する
         * @var view
         */




        //6商品ごとにページネーション
        //$items = Item::Paginate(6);
        $items = Item::paginate(6);

        DB::table('carts')
            ->truncate();

        return view('items.index', compact('items'));
    }

    public function postItemsList()
    {

        /**
         * 商品一覧を表示する
         * @var view
         */




        //6商品ごとにページネーション
        //$items = Item::Paginate(6);
        $items = Item::paginate(6);

        return view('items.index', compact('items'));
    }

    public function detail(Request $request)
    {
        /**
         * 
         * 商品詳細
         */

        $itemId=$request->itemId;
        $itemDetails = Item::where('id', $itemId)->first();

        return view('items.itemDetail', compact('itemDetails'));
    }


    public function postmycart(Request $request)
    {
        /**
         * 
         * 購入ボタンを押された時の処理
         */

        //カートボタンのpostの値をdbに保存、削除ボタンとの条件分け

        if (isset($request->addCart)) {
            $cart = new Cart;

            $cart->item_id = $request->itemId;
            $cart->name = $request->itemName;
            if (isset($request->itemImg)) {
                $cart->imgpash = $request->itemImg;
            } else {
                $cart->imgpash = "NULL.jpg";
            }
            $cart->detail = $request->itemDetail;
            $cart->price = $request->itemPrice;
            $cart->stock = $request->itemStock;
            $cart->save();

            //二重送信防止トークン
            $request->session()->regenerateToken();
            
            $message = "商品を追加しました";
        } elseif (isset($request->deleteCartItem)) {
            $created_at = $request->created_at;
            DB::table('carts')
                ->where('created_at', $created_at)
                ->delete();
            $message = "商品を削除しました";
        } elseif (isset($request->myCart)) {
        }

        if (!isset($message)) {
            $message = "カートの中身";
        }
        $carts = Cart::get();

        return view('mycarts.index', compact('carts', 'message'));
    }


    public function result(Request $request)
    {
        /**
         * 検索結果を取得
         */

        $keyword = $request->input('keyword');

        //検索結果で何か（keywordが）送られてきたら
        if (isset($keyword)) {
            $results = Item::where('name', 'like', '%' . $keyword . '%')->orWhere('detail', 'like', '%' . $keyword . '%')->paginate(6);

            return view('items.search', compact('results'));
        }elseif(!isset($keyword)){
            
            $items= Item::paginate(10);
            
            return view('items.index',compact('items'));
        }
    }
}
