<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;

class CheckoutController extends Controller
{

    function checkout(Request $request, $id)
    {
        $date = Carbon::parse($request->date);

        $cardMember = Member::where('user_id', Auth::user()->id)->first();

        $expireDate = Carbon::now();
        $expireDate->addDay(1);

        if ($expireDate->gt($cardMember->expiredAt)) {

            return redirect()->route('member.expired');
        }


        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'product_id' => $id,
            'gym_id' => $request->gym_id,
            'type' => $request->type,
            'status' => 'pending',
            'date' => $date->format('Y-m-d'),
            'total_price' => $request->price,

        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->price,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->firstname,
                'last_name' => Auth::user()->lastname,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
            ),
        );


        $snapToken = Snap::getSnapToken($params);
        $transaction->snap_token = $snapToken;
        $transaction->save();


        return redirect()->route('transaction');
    }

    function checkoutCardMember(Request $request, $id)
    {
        $date = Carbon::parse($request->date);
        
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'product_id' => $id,
            'gym_id' => $request->gym_id,
            'type' => $request->type,
            'status' => 'pending',
            'date' => $date->format('Y-m-d'),
            'total_price' => $request->price,

        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->price,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->firstname,
                'last_name' => Auth::user()->lastname,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
            ),
        );


        $snapToken = Snap::getSnapToken($params);
        $transaction->snap_token = $snapToken;
        $transaction->save();


        return redirect()->route('transaction');
    }
}
