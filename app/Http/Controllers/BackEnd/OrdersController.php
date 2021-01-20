<?php

namespace App\Http\Controllers\BackEnd;

use App\User;
use App\Combo;
use App\Order;
use App\Product;
use App\Checkout;
use App\PromoCode;
use App\OrderDetail;
use App\OrderSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Order::where('confirmed_by_user', 1)->orderBy('id', 'DESC')->paginate(10);

        return view('backend.orders.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findorFail($id);
        $subTotal = 0;
        $total = 0;
        $offer = null;
        $promo = null;
        $delivery = null;
        $orderSetting = OrderSetting::findorFail(1);
        $taxes = $orderSetting->taxes;
        $checkout = $order->checkout()->first();
        $address = $checkout->address()->first();
        $location = $address->location()->first();
        $delivery = $location->price;
        
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

        return view('backend.orders.show', compact('order', 'checkout', 'orderDetails', 'subTotal', 'taxes', 'delivery', 'promo', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Order::findorFail($id);

        return view('backend.orders.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'order_status' => 'required'
        ]);
        
        $order = Order::findorFail($id);
                
        $order->update([
            'status' => $request->order_status
        ]);

        Session::flash('flash_message', 'Order updated successfully!');
        Session::flash('flash_class', 'alert alert-success');
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findorFail($id);

        $order->update([
            'status' => 'cancelled'
        ]);

        Session::flash('flash_message', 'Order cancelled successfully!');
        Session::flash('flash_class', 'alert alert-success');
        return redirect()->route('orders.index');
    }
}