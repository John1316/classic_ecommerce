<?php

namespace App\Http\Controllers\BackEnd;

use App\Slider;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreSlidersRequest;
use App\Http\Requests\UpdateSlidersRequest;

class SlidersController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Slider::latest()->paginate(10);

        return view('backend.sliders.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlidersRequest $request)
    {
        $requestArray = $request->all();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('sliders'), $fileName);
        }

        $requestArray = ['image' => $fileName] + $request->all();

        $row = Slider::create($requestArray);

        Session::flash('flash_message', 'Slider added successfully');
        return redirect()->route('sliders.index');
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
        $row = Slider::findorFail($id);

        return view('backend.sliders.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlidersRequest $request, $id)
    {
        $slider = Slider::findorFail($id);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('sliders'), $fileName);

            if($slider->image !== NULL) {
                if (file_exists(public_path('sliders/'. $slider->image))) {
                    unlink(public_path('sliders/'. $slider->image));
                }
            }
        }
        $requestArray = ['image' => $request->hasFile('image') ? $fileName : $slider->image] + $request->all();
        $slider->update($requestArray);

        Session::flash('flash_message', 'Slider updated successfully');
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findorFail($id);
        if($slider->image !== NULL) {
            if(file_exists(public_path('sliders/'. $slider->image))) {
                unlink(public_path('sliders/'. $slider->image));
            }
        }
        $slider->delete();


        Session::flash('flash_message', 'Slider deleted successfully');
        return redirect()->route('sliders.index');
    }
}
