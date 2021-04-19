<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Information;




class InformationController extends Controller
{
    public function userInformation(Request $request)
    {

        /**
         * 購入手続き画面
         */
        $buyItem = $request->buyItem;
        $buyItems = DB::table('carts')
            ->where('created_at', $buyItem)
            ->get();

        return view('information.userInformation', compact('buyItems'));
    }


    public function checkInformation(Request $request)
    {

        /**
         * 
         * 入力情報確認画面
         */

        $name = $request->name;
        $tel = $request->tel;
        $postalCode = $request->postalCode;
        $address = $request->address;
        $email = $request->email;

        $buyItem = $request->buyItem;
        $buyItems = DB::table('carts')
            ->where('created_at', $buyItem)
            ->get();
        
        //バリデーション 
        $limit = 255;
        $errMsg  = "※正しく記入してください";

        $length = array($name,$tel,$postalCode,$address,$email);
        
        foreach ($length as $lenge){
            if(mb_strlen($lenge) > $limit){
                return view('information.userInformation',compact('buyItems','errMsg'));
            }
        }
        
        return view('information.checkInformation', compact('name', 'tel', 'postalCode', 'address', 'email', 'buyItems'));
    }

    public function buySuccess(Request $request)
    {

        /**
         * 
         * 購入完了、購入者情報登録
         */
        
        $information = new Information;
        $information->name = $request->name;
        $information->tel = $request->tel;
        $information->postalCode = $request->postalCode;
        $information->address = $request->address;
        $information->email = $request->email;
        $information->item_id = $request->itemId;
        $information->save();


        $itemId = $request->itemId;

        DB::table('items')
            ->where('id', $itemId)
            ->decrement('stock', 1);
            

        
        //二重送信防止トークン
        $request->session()->regenerateToken();

        return view('information.buySuccess');
    }
}
