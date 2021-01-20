<?php

namespace App\Http\Controllers;

use App\Combo;
use App\Offer;
use App\Gallery;
use App\Product;
use App\Category;
use App\PromoCode;
use App\OrderSetting;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCheckoutRequest;

class CheckoutController extends Controller
{
    public function index() {
        $subTotal = 0;
        $total = 0;
        $promoInNumber = NULL;
        $delivery = null;
        $orderSetting = OrderSetting::findorFail(1);
        $taxes = $orderSetting->taxes;
        if(auth()->user()) {
            $order = auth()->user()->unConfirmedOrder();
            if($order) {
                $checkout = $order->checkout()->first();
                if($checkout) {
                    $address = $checkout->address()->first();
                    $location = $address->location()->first();
                    $delivery = $location->price;
                    if($order->order_details()->count()) {
                        $orderDetails = $order->order_details()->get();
                        $promo = PromoCode::find($order->promo_code_id);
                            foreach($orderDetails as $orderDetail) {
                                $subTotal += $orderDetail->price * $orderDetail->quantity;
                            }
                            $total = $subTotal;
                            if($promo) {
                                $promoInNumber = $subTotal * ( $promo->percentage / 100 );
                                $total = $total - $promoInNumber;
                            }
                            $total = $total + $delivery;
                            $taxesInNumber = $total * ( $taxes / 100 );
                            $total = $total + $taxesInNumber;
                        
                        $order->update([
                            'total_price' => $total
                        ]);
    
                    } else {
                        return redirect('/');
                    }  
                } else {
                    return redirect('/shipping-address');
                }
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }

        return view('frontend.checkout', compact('orderDetails', 'address', 'subTotal', 'taxes', 'taxesInNumber', 'delivery', 'promo', 'promoInNumber', 'total'));
    }

    public function confirmCheckout(Request $request) {
        $order = auth()->user()->unConfirmedOrder();
        $order->update([
            'confirmed_by_user' => 1,
            'status' => 'submitted'
        ]);

        return redirect()->route('welcome');
    }
}
