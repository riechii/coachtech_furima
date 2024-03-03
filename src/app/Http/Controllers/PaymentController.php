<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;
use App\Models\Purchase;
use Carbon\Carbon;

class PaymentController extends Controller
{
    //購入画面の表示
    public function purchase($item_id)
    {
        $paymentMethod = session('payment_method');
        $item = Item::find($item_id);

        return view('purchase', ['item' => $item, 'paymentMethod' => $paymentMethod]);
    }

    //支払い変更画面の表示
    public function payment($item_id)
    {
        $item = Item::find($item_id);
        return view('payment', ['item' => $item]);
    }

    //支払い変更処理
    public function paymentChange(Request $request)
    {
        // $paymentMethod = $request->payment_method;
        // session(['payment_method' => $paymentMethod]);
        $paymentMethod = $request->payment_method;
        $paymentMethodName = '';

        switch ($paymentMethod) {
            case 'card':
                $paymentMethodName = 'クレジットカード';
                break;
            case 'bank':
                $paymentMethodName = '銀行振込';
                break;
            case 'convenience':
                $paymentMethodName = 'コンビニ支払い';
                break;
        }
        session(['payment_method' => $paymentMethodName]);

        return redirect()->route('purchase', ['item_id' => $request->item_id]);
    }

    //購入処理
    public function buy(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
            $purchase = new Purchase();
            $purchase->user_id = auth()->id();
            $purchase->item_id = $request->input('item_id');
            $purchase->sales_day = Carbon::now();
            $purchase->payment = session('payment_method');
            $purchase->save();

            return redirect()->route('mypage')->with('message', '購入が完了しました。');
    }
}
