<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 10/31/18
 * Time: 5:32 PM
 */

namespace App\General;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Payment
{
    private function HandleKeepFromBonus($amount)
    {
        $bonus = Auth::user()->ref_balance;
        if($bonus >= $amount){
            User::where('id', Auth::id())
                ->decrement('ref_bonus', $amount);
        }
    }

    public static function UpdatePayment($paymentDetails = [])
    {
        //Update payment history
        Payment::create([
            'user_id' => Auth::id(),
            'amount' => $paymentDetails['data']['amount'],
            'reference' => $paymentDetails['data']['reference']
        ]);

        //Update users balance and authorization code
        //Check if user is employee and first payment
        if(Session::has('firstEmployeeAmount')){
            $updateValue = [
                'authorization_code' => $paymentDetails['data']['authorization']['authorization_code'],
                'pennywise' => Session::get('firstEmployeeAmount')
            ];
        }else{
            $updateValue = [
                'authorization_code' => $paymentDetails['data']['authorization']['authorization_code']
            ];
        }

        DB::table('users')->where('id', Auth::id())
            ->increment('balance', $paymentDetails['data']['amount']/100, $updateValue);

        Session::forget('firstEmployeeAmount');

        //Flash session message
        self::flashSession(
            "Payment Successful",
            $paymentDetails['data']['gateway_response'],
            $paymentDetails['data']['amount']
        );
    }

    public static function flashSession($title, $message, $amount = null)
    {
        Session::flash('title', $title);
        Session::flash('message', $message);
        Session::flash('amount', $amount);
    }
}