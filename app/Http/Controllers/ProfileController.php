<?php

namespace App\Http\Controllers;

use App\PromoCode;
use App\OrderSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function profile() {
        if(auth()->user()) {
            $currentOrders = auth()->user()->orders()->where('status', '!=', 'delivered')->latest()->get();
            $previousOrders = auth()->user()->orders()->where('status', 'delivered')->latest()->get();
            foreach($previousOrders as $previousOrder) {
                $subTotal = 0;
                $total = 0;
                $offer = null;
                $promo = null;
                $delivery = null;
                $orderSetting = OrderSetting::findorFail(1);
                $taxes = $orderSetting->taxes;
                $checkout = $previousOrder->checkout()->first();
                $address = $checkout->address()->first();
                $location = $address->location()->first();
                $delivery = $location->price;
                $orderDetails = $previousOrder->order_details()->get();
                $promo = PromoCode::find($previousOrder->promo_code_id);
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
                $previousOrder->setAttribute('subTotal', $subTotal);   
                $previousOrder->setAttribute('taxes', $taxes);    
                $previousOrder->setAttribute('delivery', $delivery);    
                $previousOrder->setAttribute('offer', $offer);    
                $previousOrder->setAttribute('promo', $promo);    
                $previousOrder->setAttribute('total', $total);    
            }
        } else {
            return redirect('/login');
        }
        return view('frontend.profile', compact('currentOrders', 'previousOrders'));
    }

    public function updateProfile(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|digits:11',
        ]);

        auth()->user()->update([
            'name' => $request->name,
            'phone' => $request->phone
        ]);
        if(app()->getLocale() === 'en') {
        return redirect()->route('profile')
        ->with('flash_message', 'Profile information updated successfully')
        ->with('flash_class', 'alert alert-success');
        } else {
            return redirect()->route('profile')
            ->with('flash_message', 'تم تعديل المعلومات الشخصية بنجاح')
            ->with('flash_class', 'alert alert-success');
        }
    }   

    public function updatePassword(Request $request) {
        $this->validate($request, [
            'old_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if(Hash::check($request->old_password, auth()->user()->password)) {

            auth()->user()->update([
                'password' => Hash::make($request->password)
            ]);
            if(app()->getLocale() === 'en') {
            return redirect()->route('profile')
                ->with('flash_message', 'Password updated successfully')
                ->with('flash_class', 'alert alert-success')
                ->with('flash_open', 'show active');
            }else{
                return redirect()->route('profile')
                ->with('flash_message', 'تم تغير كلمة المرور بنجاح')
                ->with('flash_class', 'alert alert-success')
                ->with('flash_open', 'show active');
            }

        } else {
            if(app()->getLocale() === 'en') {
            return redirect()->route('profile')
            ->with('flash_message', 'Old password is wrong')
            ->with('flash_class', 'alert alert-danger')
            ->with('flash_open', 'show active');
            }else{
             return redirect()->route('profile')
            ->with('flash_message', 'كلمة المرور الحالية خاطئة')
            ->with('flash_class', 'alert alert-danger')
            ->with('flash_open', 'show active');
            }

        }
    }
}
