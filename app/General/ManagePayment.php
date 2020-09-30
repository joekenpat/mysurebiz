<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 12/6/18
 * Time: 4:53 PM
 */

namespace App\General;

use App\Models\Payment;
use App\User;
//use Paystack;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ManagePayment
{
    public static function HandleKeepFromBonus($amount)
    {
        $bonus = Auth::user()->ref_bonus;
        if($amount > $bonus){
            return false;
        }
        User::where('id', Auth::id())
            ->decrement('ref_bonus', $amount);
        return self::UpdatePayment($amount);
    }

    public static function UpdatePayment($amount = null, $paymentDetails = [])
    {
        //Update Referral bonus
        //Check if first payment and was referred by someone
        if(!Auth::user()->balance && Auth::user()->ref_by){
            DB::table('users')->where('ref_code', Auth::user()->ref_by)
                ->increment('ref_bonus', 25); //Add 25naira
        }

        //Update User payment record
        $amountPayed = $paymentDetails->data->amount * 100 ??($amount );

        //Update payment history
        Payment::create([
            'user_id' => Auth::id(),
            'amount' => $amountPayed,
            'reference' => $paymentDetails->data->txref??"referral bonus"
        ]);

        //Update users balance and authorization code
        //Check if user is employee and first payment
        if(Session::has('firstEmployeeAmount')){
            $updateValue = [
                'authorization_code' => $paymentDetails->data->authorization->authorization_code??null,
                'pennywise' => Session::get('firstEmployeeAmount')
            ];
        }else{
            $updateValue = [
                'authorization_code' => $paymentDetails->data->authorization->authorization_code??null
            ];
        }

        //update users balance and pennywise for 1st employee payments
        DB::table('users')->where('id', Auth::id())
            ->increment('balance',
                $amountPayed/100,$updateValue
            );

        Session::forget('firstEmployeeAmount');

        //Flash session message
        self::flashSession(
            "Payment Successful",
            $paymentDetails->data->gateway_response??"Successful",
            $amountPayed
        );
        return true;
    }

    public static function flashSession($title, $message, $amount = null)
    {
        Session::flash('title', $title);
        Session::flash('message', $message);
        Session::flash('amount', $amount);
    }
}
