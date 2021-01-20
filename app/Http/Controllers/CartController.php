<?php

namespace App\Http\Controllers;

use App\Product;
use App\PromoCode;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index() {
        if(!auth()->guest()) {
            if(auth()->user()->unConfirmedOrder() != NULL) {
                $order = auth()->user()->unConfirmedOrder();
                $subTotal = 0;
                $total = 0;
                $promoInNumber = NULL;
                foreach($order->order_details as $orderDetail) {
                    $subTotal += $orderDetail->quantity * $orderDetail->price;
                }
                if($order->promo_code_id != NULL) {
                    $promo = PromoCode::find($order->promo_code_id);
                    $promoInNumber = $subTotal * ( $promo->percentage / 100 );
                    $total = $subTotal - $promoInNumber;
                } else {
                    $total = $subTotal;
                }

                $order->update([
                    'total_price' => $total
                ]);

                return view('frontend.cart', compact('order', 'subTotal', 'promoInNumber', 'total'));

            } else {
                return view('frontend.cart');
            }
        } else {    
            return redirect('/login');
        }
    }

    public function addToCart(Request $request) {
        if(!auth()->guest()) {
            if(auth()->user()->unConfirmedOrder() != NULL) {
                $order = auth()->user()->unConfirmedOrder();
                    if($order->order_details()->count()) {

                        $product = Product::findorFail($request->product_id);

                        $orderDetailFound = $order->order_details()->where('product_id', $request->product_id)->first();
                        if($orderDetailFound) {
                            $orderDetailFound->update([
                                'quantity' => $orderDetailFound->quantity + $request->quantity,
                            ]);
                        } else {
                            $order->order_details()->create([
                                'product_id' => $request->product_id,
                                'price' => $product->price_after_discount != NULL ? $product->price_after_discount : $product->price_before_discount,
                                'quantity' => $request->quantity,
                            ]);
                        }

                        if(app()->getLocale() === 'en') {
                            Session::flash('flash_message', $product->en_name . ' added to cart');
                            Session::flash('flash_class', 'alert alert-success');
                            
                        } else {
                            Session::flash('flash_message', ' تمت إضافة ' . $product->ar_name . ' إلى سلة التسوق');
                            Session::flash('flash_class', 'alert alert-success');
                            
                        }

                        return redirect()->route('cart');

                    } else {

                        $product = Product::findorFail($request->product_id);

                        $orderDetail = $order->order_details()->create([
                            'product_id' => $request->product_id,
                            'price' => $product->price_after_discount != NULL ? $product->price_after_discount : $product->price_before_discount,
                            'quantity' => $request->quantity,
                        ]);
                        

                        if(app()->getLocale() === 'en') {
                            Session::flash('flash_message', $product->en_name . ' added to cart');
                            Session::flash('flash_class', 'alert alert-success');
                            
                        } else {
                            Session::flash('flash_message', ' تمت إضافة ' . $product->ar_name . ' إلى سلة التسوق');
                            Session::flash('flash_class', 'alert alert-success');
                            
                        }

                        return redirect()->route('cart');

                    }
                } else {

                    $order = auth()->user()->orders()->create([
                        'total_price' => 0,
                        'confirmed_by_user' => 0
                    ]);

                    $product = Product::findorFail($request->product_id);

                    $orderDetail = $order->order_details()->create([
                        'product_id' => $request->product_id,
                        'price' => $product->price_after_discount != NULL ? $product->price_after_discount : $product->price_before_discount,
                        'quantity' => $request->quantity,
                    ]);
                    
                    if(app()->getLocale() === 'en') {
                        Session::flash('flash_message', $product->en_name . ' added to cart');
                        Session::flash('flash_class', 'alert alert-success');
                        
                    } else {
                        Session::flash('flash_message', ' تمت إضافة ' . $product->ar_name . ' إلى سلة التسوق');
                        Session::flash('flash_class', 'alert alert-success');
                        
                    }
                    
                    return redirect()->route('cart');

                }
        } else {
            return redirect('/login');
        }
    }

    public function updateCart(Request $request) {
        $productsIds = $request->products_id;
        $productsQuantity = $request->quantity;
        $order = auth()->user()->unConfirmedOrder();
        foreach($order->order_details as $orderDetail) {
            foreach($productsIds as $key => $productId) {
                if($orderDetail->product_id == $productId) {
                    $orderDetail->update([
                        'quantity' => $productsQuantity[$key]
                    ]); 
                }
            }
        }

        if(app()->getLocale() === 'en') {
            Session::flash('flash_message', 'Cart updated successfully');
            Session::flash('flash_class', 'alert alert-success');
            
        } else {
            Session::flash('flash_message', 'تم تحديث عربة التسوق بنجاح');
            Session::flash('flash_class', 'alert alert-success');
            
        }

        return redirect()->route('cart');   
    }

    public function removeFromCart($id) {
        $orderDetail = OrderDetail::findorFail($id);
        $order = $orderDetail->order;
        $product = Product::findorFail($orderDetail->product_id);

        $orderDetail->delete();

        if(count($order->order_details) == 0) {
            $order->delete();
        }

        if(app()->getLocale() === 'en') {
            Session::flash('flash_message', $product->en_name . ' removed from cart');
            Session::flash('flash_class', 'alert alert-danger');
            
        } else {
            Session::flash('flash_message', ' تمت إزالة ' . $product->ar_name . ' من سلة التسوق');
            Session::flash('flash_class', 'alert alert-danger');
            
        }
        return redirect()->route('cart');
    }

    public function applyCoupon(Request $request) {
        $promo = PromoCode::where('code', $request->promo_code)->first();
        if($promo) {
            if($promo->status == 1) {
                $isAlreadyUsed = false;
                foreach(auth()->user()->confirmedOrders as $order) {
                    if($order->promo_code_id == $promo->id) {
                        $isAlreadyUsed = true;
                    }
                }
                if($isAlreadyUsed == false) {
                    $order = auth()->user()->unConfirmedOrder();
                    $order->update([
                        'promo_code_id' => $promo->id
                    ]);
                    if(app()->getLocale() === 'en') {
                        Session::flash('flash_message', 'Coupon applied successfully');
                        Session::flash('flash_class', 'alert alert-success');
                        
                    } else {
                        Session::flash('flash_message', 'تم تطبيق الرمز الترويجي بنجاح');
                        Session::flash('flash_class', 'alert alert-success');
                        
                    }
                    return redirect()->route('cart');
                } else {
                    if(app()->getLocale() === 'en') {
                        Session::flash('flash_message', 'You have used this promo code before');
                        Session::flash('flash_class', 'alert alert-danger');
                        
                    } else {
                        Session::flash('flash_message', 'لقد استخدمت هذا الرمز الترويجي من قبل');
                        Session::flash('flash_class', 'alert alert-danger');
                        
                    }
                    return redirect()->route('cart');
                }
            } else {
                if(app()->getLocale() === 'en') {
                    Session::flash('flash_message', 'Expired promo code');
                    Session::flash('flash_class', 'alert alert-danger');
                    
                } else {
                    Session::flash('flash_message', 'كود الترويجي منتهي الصلاحية');
                    Session::flash('flash_class', 'alert alert-danger');
                    
                }
                return redirect()->route('cart');
            }
        } else {
            if(app()->getLocale() === 'en') {
                Session::flash('flash_message', 'Invalid promo code');
                Session::flash('flash_class', 'alert alert-danger');
                
            } else {
                Session::flash('flash_message', 'كود الترويجي خطا');
                Session::flash('flash_class', 'alert alert-danger');
                
            }
            return redirect()->route('cart');
        }
    }
}
