<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request, $type = null)
    {
        $paymentQuery = Payment::leftJoin('users', 'users.id', 'payments.user_id')
            ->select('payments.reference', 'payments.amount', 'payments.created_at',
                'payments.user_id', 'users.email', 'users.role');

        if($request->isMethod('post')){
            $payments = $paymentQuery->where('users.email',trim($request->email))
                ->paginate(30);
        }else{
            $userRole = ($type == "students")?1:(($type == "artisans")?2:(($type == "employees")?3:null));
            $payments = $paymentQuery->when($userRole, function ($query, $userRole){
                return $query->where('users.role', $userRole);
            })->paginate(10);
        }
        return view('payments', ['payments' => $payments]);
    }
}
