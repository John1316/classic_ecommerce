<?php

namespace App\Http\Controllers\BackEnd;

use App\Combo;
use App\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Offer::latest()->paginate(10);

        return view('backend.offers.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $combos = Combo::get();
        return view('backend.offers.create', compact('combos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfferRequest $request)
    {

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('offers'), $fileName);
        }

        Offer::create([
            'combo_id' => $request->combo_id,
            'percentage' => $request->percentage,
            'image' => isset($fileName) ? $fileName : NULL
        ]);

        Session::flash('flash_message', 'Offer created successfully!');
        return redirect()->route('offers.index');
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
        $row = Offer::findorFail($id);
        $combos = Combo::get();

        return view('backend.offers.edit', compact('row', 'combos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfferRequest $request, $id)
    {

        $offer = Offer::findorFail($id);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('offers'), $fileName);

            if($offer->image !== NULL) {
                if (file_exists(public_path('offers/'. $offer->image))) {
                    unlink(public_path('offers/'. $offer->image));
                }
            }
        }

        $offer->update([
            'combo_id' => $request->combo_id,
            'percentage' => $request->percentage,
            'image' => isset($fileName) ? $fileName : $offer->image
        ]);

        Session::flash('flash_message', 'Offer updated successfully!');
        return redirect()->route('offers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::findorFail($id);

        if($offer->image !== NULL) {
            if(file_exists(public_path('offers/'. $offer->image))) {
                unlink(public_path('offers/'. $offer->image));
            }
        }

        $offer->delete();

        Session::flash('flash_message', 'Offer deleted successfully!');
        return redirect()->route('offers.index');
    }
}
