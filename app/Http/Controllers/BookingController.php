<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Room;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Stripe;

class BookingController extends Controller
{

    function confirmBooking()
    {

        $user = Auth::user('web'); 

        $attributes = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contacts' => 'required',
            'country' => 'required',
            'zip' => 'nullable',
            'state' => 'nullable',
            'email' => 'required',
            
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvv' => 'required',
        ]);

        $attributes["contacts"] = [$attributes["contacts"]];
        // update tourist data
        $user->update($attributes);

        $booking = Session::get('currentBooking');

        $unitTotal=0;

        $package = Package::whereHas('profile', function (Builder $query) {
            $query->whereNotNull('approved_by');
        })->where('id', $booking['packageID'])->first();

        $unitTotal = $package->total;

        $room = null;

        if ($booking['room'] > 0) {
            $room = Room::where('id',$booking['room'])->first();
            $unitTotal = $room->price;
            $room = $room->id;
        }

         // save booking
         $newBooking = new Booking();

         $newBooking->package_id = $booking['packageID'];
         $newBooking->tourist_id = $user->id;
         $newBooking->start_date = $booking['startDate'];
         $newBooking->end_date = $booking['endDate'];
         $newBooking->room_id = $room;
         $newBooking->offer_id = null;
         $newBooking->status = 0;
         $newBooking->rating = null;
         $newBooking->comment = null;
         $newBooking->complaint = null;
         $newBooking->pkg_qty = $booking['pkg_qty'];
         $newBooking->total = $unitTotal * $newBooking->pkg_qty;
         $newBooking->save();

         Session::forget('currentBooking');

        //make payment

        $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {

            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number"    => $attributes['card_no'],
                    "exp_month" => $attributes['expiry_month'],
                    "exp_year"  => $attributes['expiry_year'],
                    "cvc"       => $attributes['cvv']
                )));

            if (!isset($response['id'])) {
                return redirect('checkout')->with('error', 'Stripe token error.');;
            }

            $charge = \Stripe\Charge::create([
                'card' => $response['id'],
                'currency' => 'LKR',
                'amount' =>  $unitTotal * $booking['pkg_qty']*100,
                'description' => 'wallet',
            ]);
 
            if($charge['status'] == 'succeeded') {
                
                //save payment

                $payment = new Payment();
                $payment->amount = $unitTotal * $booking['pkg_qty'];
                $payment->date = date('Y-m-d');
                $payment->stripe_id=$charge['id'];
                $payment->card_last_four=$charge['payment_method_details']["card"]["last4"];
                $payment->card_brand=$charge['payment_method_details']["card"]["brand"];
                $payment->booking_id = $newBooking->id;
                $payment->save();

                $newBooking->status = 1;
                $newBooking->update();

                return redirect('/thankyou/'.$newBooking->id);
 
            } else {
                return redirect('/thankyou/'.$newBooking->id)->with('error', 'payment error.');
            }
 
        }
        catch (Exception $e) {
            return redirect('/thankyou/'.$newBooking->id)->with('error',$e->getMessage());
        }
       

    }


    public function retryPayment(){

        $attributes = request()->validate([
            'booking_id' => 'required',
            'amount' => 'required',
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvv' => 'required',
        ]);

        $booking = Booking::where('id',$attributes["booking_id"])->first();

        //make payment

        $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {

            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number"    => $attributes['card_no'],
                    "exp_month" => $attributes['expiry_month'],
                    "exp_year"  => $attributes['expiry_year'],
                    "cvc"       => $attributes['cvv']
                )));

            if (!isset($response['id'])) {
                return redirect('checkout')->with('error', 'Stripe token error.');;
            }

            $charge = \Stripe\Charge::create([
                'card' => $response['id'],
                'currency' => 'LKR',
                'amount' =>  $attributes["amount"]*100,
                'description' => 'wallet',
            ]);
 
            if($charge['status'] == 'succeeded') {
                
                //save payment

                $payment = new Payment();
                $payment->amount = $attributes["amount"];
                $payment->date = date('Y-m-d');
                $payment->stripe_id=$charge['id'];
                $payment->card_last_four=$charge['payment_method_details']["card"]["last4"];
                $payment->card_brand=$charge['payment_method_details']["card"]["brand"];
                $payment->booking_id = $attributes["booking_id"];
                $payment->save();

                $booking->status = 1;
                $booking->update();

                return redirect('/thankyou/'.$booking->id)->with('success','Payment success');
 
            } else {
                return redirect('/thankyou/'.$booking->id)->with('error', 'payment error.');
            }
 
        }
        catch (Exception $e) {
            return redirect('/thankyou/'.$booking->id)->with('error',$e->getMessage());
        }
    }


}
