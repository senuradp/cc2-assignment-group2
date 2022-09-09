<?php

namespace App\Http\Controllers;

use App\Models\HotelProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripeController extends Controller
{
    public function payStripe(Request $request)
    { 
        $this->validate($request, [
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvv' => 'required',
        ]);
 
        $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
        try {
            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number"    => $request->input('card_no'),
                    "exp_month" => $request->input('expiry_month'),
                    "exp_year"  => $request->input('expiry_year'),
                    "cvc"       => $request->input('cvv')
                )));
            if (!isset($response['id'])) {
                return redirect()->route('addmoney.paymentstripe');
            }
            $charge = \Stripe\Charge::create([
                'card' => $response['id'],
                'currency' => 'LKR',
                'amount' =>  env('REG_FEE'),
                'description' => 'wallet',
            ]);
 
            if($charge['status'] == 'succeeded') {
                //update hotel_profiles
                $hotel_pro_id = Auth::user('hotel')->hotel_profile_id;
                $hotel = HotelProfile::where('id',$hotel_pro_id)->first();
                $hotel->registration_fee_status=1;
                $hotel->stripe_id=$charge['id'];
                $hotel->card_last_four=$charge['payment_method_details']["card"]["last4"];
                $hotel->card_brand=$charge['payment_method_details']["card"]["brand"];
                $hotel->reg_free=number_format(env('REG_FEE')/100,2,".","");
                $hotel->save();

                return redirect('hotel-portal/profile')->with('success', 'Payment Success!');
 
            } else {
                return redirect('hotel-portal/profile')->with('error', 'something went to wrong.');
            }
 
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
 
    }
}
