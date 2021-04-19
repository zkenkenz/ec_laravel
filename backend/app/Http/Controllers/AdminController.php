<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Subset;

class AdminController extends Controller
{
    public function itemsList()
    {
        /**
         * 管理者用商品一覧
         */


        //itemsテーブルからデータ取得最新から
        $items = DB::table('items')
            ->orderBy('created_at', 'DESC')
            ->paginate(7);
        $message = "管理者商品登録・編集用";
        return view('admin.itemsList', compact('items', 'message'));
    }


    public function checkRegister(Request $request)
    {

        /**
         * 
         * 登録確認画面
         */

        //post情報を代入
        $registerName = $request->itemName;
        if (isset($request->itemImg)) {
            $registerImgpash = $request->file('itemImg')->store('public/image');
            $registerImgpash = str_replace('public/image/', '', $registerImgpash);
        } else {
            $registerImgpash = "NULL.jpg";
        }
        $registerDetail = $request->itemDetail;
        $registerPrice = $request->itemPrice;
        $registerStock = $request->itemStock;

        //バリデーション 
        $limit = 255;
        $errMsg  = "※255文字以内で正しく記入してください";

        $length = array($registerName, $registerDetail);

        foreach ($length as $lenge) {
            if (mb_strlen($lenge) > $limit) {
                $items = DB::table('items')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(7);
                $message = "管理者商品登録・編集用";
                return view('admin.itemsList', compact('items', 'message', 'errMsg'));
            }
        }
        return view('admin.checkRegister', compact('registerName', 'registerImgpash', 'registerDetail', 'registerPrice', 'registerStock'));
    }



    public function checkDelete(Request $request)
    {

        /**
         * 
         * 削除確認画面
         */

        //post情報を代入
        $deleteId = $request->deleteId;
        $deleteName = $request->deleteName;
        $deleteImgpash = $request->deleteImg;
        $deleteDetail = $request->deleteDetail;
        $deletePrice = $request->deletePrice;
        $deleteStock = $request->deleteStock;
        return view('admin.checkDelete', compact('deleteId', 'deleteName', 'deleteImgpash', 'deleteDetail', 'deletePrice', 'deleteStock'));
    }

    public function edit(Request $request)
    {
        /**
         * 
         * 編集画面
         */

        //post情報を代入
        if (isset($request->edit)) {
            $editId = $request->editId;
            $editName = $request->editName;
            $editImgpash = $request->editImg;
            $editDetail = $request->editDetail;
            $editPrice = $request->editPrice;
            $editStock = $request->editStock;
            return view('admin.edit', compact('editId', 'editName', 'editImgpash', 'editDetail', 'editPrice', 'editStock'));
        } elseif (isset($request->checkEdit)) {
            $editId = $request->editId;
            $editName = $request->editName;
            if (isset($request->editImg)) {
                $editImgpash = $request->file('editImg')->store('public/image');
                $editImgpash = str_replace('public/image/', '', $editImgpash);
            } else {
                $editImgpash = $request->subEditImg;
            }
            $editDetail = $request->editDetail;
            $editPrice = $request->editPrice;
            $editStock = $request->editStock;

            //バリデーション 
            $limit = 255;
            $errMsg  = "※255文字以内で正しく記入してください";

            $length = array($editName, $editDetail);

            foreach ($length as $lenge) {
                if (mb_strlen($lenge) > $limit) {
                    return view('admin.edit', compact('editId', 'editName', 'editImgpash', 'editDetail', 'editPrice', 'editStock', 'errMsg'));
                }
            }

            return view('admin.checkEdit', compact('editId', 'editName', 'editImgpash', 'editDetail', 'editPrice', 'editStock'));
        }
    }



    public function result(Request $request)
    {

        /**
         * 
         * 登録、削除、編集の処理
         */
        //postで送られた情報が登録なら

        if (isset($request->itemRegister)) {
            $item = new Item;
            $item->name = $request->registerName;
            if (isset($request->registerImgpash)) {
                $item->imgpash = $request->registerImgpash;
            } else {
                $item->imgpash = "NULL.jpg";
            }
            $item->detail = $request->registerDetail;
            $item->price = $request->registerPrice;
            $item->stock = $request->registerStock;

            //$requestが正確に送られた時DBに保存、送られなければリダイレクト
            if (isset($item->name, $item->imgpash, $item->detail, $item->price, $item->stock)) {
                $item->save();
            } else {
                return redirect('admin');
            }
            //最新の情報が一番上にくるように表示
            $items = DB::table('items')
                ->orderBy('created_at', 'DESC')
                ->paginate(7);

            $message =  "新商品を登録しました";
            //二重送信防止対策
            $request->session()->regenerateToken();

            return view('admin.itemsList', compact('items', 'message'));
        } elseif (isset($request->itemDelete)) {
            $deleteId = $request->deleteId;
            DB::table('items')
                ->where('id', $deleteId)
                ->delete();
            $message =  "商品を削除しました";

            $items = DB::table('items')
                ->orderBy('created_at', 'DESC')
                ->paginate(7);

            return view('admin.itemsList', compact('items', 'message'));
        } elseif (isset($request->itemEdit)) {
            $editId = $request->editId;
            $update_column = [
                'name' => $request->editName,
                'imgpash' => $request->editImg,
                'detail' => $request->editDetail,
                'price' => $request->editPrice,
                'stock' => $request->editStock
            ];

            DB::table('items')
                ->where('id', $editId)
                ->update($update_column);

            $message = "商品を編集しました";

            $items = DB::table('items')
                ->orderBy('created_at', 'DESC')
                ->paginate(7);
            return view('admin.itemsList', compact('items', 'message'));
        }
    }


    public function informations()
    {
        /**
         * 
         * 購入者情報を表示
         */

        $informations = DB::table('informations')->get();
        $items = DB::table('items')
            ->get();
        return view('admin.information', compact('informations', 'items'));
    }


    public function details(Request $request)
    {

        /**
         * 
         * 購入者情報詳細画面
         */

        $userInformation = $request->informationCreate_at;
        

        $userInformations = DB::table('informations')
            ->where('created_at', $userInformation)
            ->get();

        $items = DB::table('items')
            ->get();

        return view('admin.detail', compact('userInformations', 'items'));
    }
}
