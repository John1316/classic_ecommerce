<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShippingAddressController extends Controller
{
    public function index() {
        $userAddresses = auth()->user()->addresses()->get();
        $areas = Location::get();

        return view('frontend.shipping_address', compact('userAddresses', 'areas'));
    }

    public function addNewAddress(Request $request) {
        auth()->user()->addresses()->create([
            'location_id' => $request->area,
            'address' => $request->address
        ]);

        if(app()->getLocale() === 'en') {
            Session::flash('flash_message', 'New address has been added successfully... you can choose it now from your address list!');
            Session::flash('flash_class', 'alert alert-success');
        } else {
            Session::flash('flash_message', 'تمت إضافة العنوان الجديد بنجاح ... يمكنك اختياره الآن من قائمة العناوين الخاصة بك!');
            Session::flash('flash_class', 'alert alert-success');
        }
        return redirect()->route('shipping-address');
    }

    public function confirmShippingAddress(Request $request) {
        $order = auth()->user()->unConfirmedOrder();

        if($order->checkout()->first()) {
            $order->checkout()->update([
                'address_id' => $request->choosen_address
            ]);
        } else {
            $order->checkout()->create([
                'address_id' => $request->choosen_address
            ]);
        }

        return redirect()->route('checkout');
    }
}
