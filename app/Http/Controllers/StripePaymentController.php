<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\StripeClient;
use App\Models\Payment;

class StripePaymentController extends Controller
{
    public function stripePayment(Request $request){
        

        $validator =Validator::make($request->all(),[
            'name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'card_no' => 'required',
            'card_exp_m' => 'required',
            'card_exp_y' => 'required',
            'card_ccv' => 'required',
            'amount' => 'required',
            'invoice_id' => 'required|integer',
        ]);

        if($validator->fails()){
            
            flash()->addError('Please Fill All the Field');
            return redirect()->back();
            
        }else{
            
            $stripe = new StripeClient(env('STRIPE_SECRET'));
            
            $token = $stripe->tokens->create([
                'card'=>[
                    'number' => $request->card_no,
                    'name' => $request->name,
                    'address_country' => $request->country,
                    'address_city' => $request->city,
                    'exp_month' => $request->card_exp_m,
                    'exp_year' => $request->card_exp_y,
                    'cvc' => $request->card_ccv,
                ],
            ]);
            
            $charge =$stripe->charges->create([
                'amount' => intval($request->amount * 100),
                'currency' => 'usd',
                'description' => 'payment for invoice #' . $request->invoice_id,
                'source' => $token->id,
            ]);
            
            Payment::create([
                'amount' => $request->amount,
                'invoice_id' => $request->invoice_id,
            ]);

            flash()->addSuccess('Payment Success');
            return redirect()->back();
            
        }

    }
}
