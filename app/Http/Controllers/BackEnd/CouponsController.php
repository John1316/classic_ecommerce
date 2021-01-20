<?php

namespace App\Http\Controllers\Backend;

use App\PromoCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = PromoCode::latest()->paginate(10);

        return view('backend.coupons.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestArray = $request->all();

        $this->validate($request, [
            'code' => 'required|unique:promo_codes,code',
            'percentage' => 'required|integer',
            'status' => 'required|numeric',
        ]);

        $coupon = PromoCode::create($requestArray);

        Session::flash('flash_message', 'Coupon added successfully!');
        return redirect()->route('coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = PromoCode::findorFail($id);

        return view('backend.coupons.edit', compact('row'));
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
        $coupon = PromoCode::findorFail($id);

        $this->validate($request, [
            'code' => 'required|unique:promo_codes,code,'.$coupon->id,
            'percentage' => 'required|integer',
            'status' => 'required|numeric',
        ]);

        $requestArray = $request->all();

        $coupon->update($requestArray);

        Session::flash('flash_message', 'Coupon updated successfully!');
        return redirect()->route('coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = PromoCode::findorFail($id);

        $coupon->delete();

        Session::flash('flash_message', 'Coupon deleted successfully!');
        return redirect()->route('coupons.index');
    }
}
