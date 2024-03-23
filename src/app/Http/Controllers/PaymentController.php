<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;
use App\Models\Purchase;
use Carbon\Carbon;
use App\Http\Requests\BuyRequest;
use Stripe\Stripe;
use Stripe\Charge;

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
    public function buy(BuyRequest $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
            $purchase = new Purchase();
            $purchase->user_id = auth()->id();
            $purchase->item_id = $request->input('item_id');
            $purchase->sales_day = Carbon::now();
            $paymentMethod = $request->payment;
            $purchase->payment = $paymentMethod;
            $purchase->save();

            $item = Item::find($request->input('item_id'));
            $amount = $item->price;

            if ($purchase->payment === 'クレジットカード') {

                return redirect()->route('stripeForm', ['item_id' => $item->id]);
            } else {

                return redirect()->route('mypage')->with('message', '購入が完了しました。');
            }
    }

    //スプライトの支払い画面表示
    public function stripeForm($item_id)
    {
        $item = Item::find($item_id);
        return view('stripe_form', ['item' => $item]);
    }

    //スプライトの支払い処理
    public function stripe(Request $request)
    {
        Stripe::setApiKey(config('stripe.secret_key'));

        $purchase = Purchase::find($request->purchase_id);
        $amount = $request->input('amount');
            $charge = Charge::create([
                'amount' => $amount,
                'currency' => 'JPY',
                'description' => '購入商品',
                'source' => $request->stripeToken,
            ]);
        return redirect()->route('mypage')->with('message', '支払いが完了しました。');
    }
}
