<?php

namespace App\Http\Controllers\BackEnd;

use App\Main;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreMainRequest;
use App\Http\Requests\Backend\UpdateMainRequest;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Main::latest()->paginate(10);

        return view('backend.main.index', compact('rows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Main::findorFail($id);

        return view('backend.main.edit', compact('row'));
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
        $main = Main::findorFail($id);

        $requestArray = $request->all();

        if($request->hasFile('home_first_ad')) {
            $file = $request->file('home_first_ad');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('main'), $fileName);

            if($main->home_first_ad !== NULL) {
                if(file_exists(public_path('main/'. $main->home_first_ad))) {
                    unlink(public_path('main/'. $main->home_first_ad));
                }
            }
        }
        if($request->hasFile('home_second_ad')) {
            $file1 = $request->file('home_second_ad');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('main'), $fileName1);

            if($main->home_second_ad !== NULL) {
                if(file_exists(public_path('main/'. $main->home_second_ad))) {
                    unlink(public_path('main/'. $main->home_second_ad));
                }
            }
        }
        if($request->hasFile('home_number_banner')) {
            $file2 = $request->file('home_number_banner');
            $fileName2 = time().str_random(10).'.'.$file2->getClientOriginalExtension();
            $file2->move(public_path('main'), $fileName2);

            if($main->home_number_banner !== NULL) {
                if(file_exists(public_path('main/'. $main->home_number_banner))) {
                    unlink(public_path('main/'. $main->home_number_banner));
                }
            }
        }
        if($request->hasFile('home_advantage_first_icon')) {
            $file3 = $request->file('home_advantage_first_icon');
            $fileName3 = time().str_random(10).'.'.$file3->getClientOriginalExtension();
            $file3->move(public_path('main'), $fileName3);

            if($main->home_advantage_first_icon !== NULL) {
                if(file_exists(public_path('main/'. $main->home_advantage_first_icon))) {
                    unlink(public_path('main/'. $main->home_advantage_first_icon));
                }
            }
        }
        if($request->hasFile('home_advantage_second_icon')) {
            $file4 = $request->file('home_advantage_second_icon');
            $fileName4 = time().str_random(10).'.'.$file4->getClientOriginalExtension();
            $file4->move(public_path('main'), $fileName4);

            if($main->home_advantage_second_icon !== NULL) {
                if(file_exists(public_path('main/'. $main->home_advantage_second_icon))) {
                    unlink(public_path('main/'. $main->home_advantage_second_icon));
                }
            }
        }
        if($request->hasFile('home_advantage_third_icon')) {
            $file5 = $request->file('home_advantage_third_icon');
            $fileName5 = time().str_random(10).'.'.$file5->getClientOriginalExtension();
            $file5->move(public_path('main'), $fileName5);

            if($main->home_advantage_third_icon !== NULL) {
                if(file_exists(public_path('main/'. $main->home_advantage_third_icon))) {
                    unlink(public_path('main/'. $main->home_advantage_third_icon));
                }
            }
        }
        if($request->hasFile('home_advantage_fourth_icon')) {
            $file6 = $request->file('home_advantage_fourth_icon');
            $fileName6 = time().str_random(10).'.'.$file6->getClientOriginalExtension();
            $file6->move(public_path('main'), $fileName6);

            if($main->home_advantage_fourth_icon !== NULL) {
                if(file_exists(public_path('main/'. $main->home_advantage_fourth_icon))) {
                    unlink(public_path('main/'. $main->home_advantage_fourth_icon));
                }
            }
        }

        $requestArray = [ 'home_first_ad' => $request->hasFile('home_first_ad') ? $fileName : $main->home_first_ad ,
        'home_second_ad' => $request->hasFile('home_second_ad') ? $fileName1 : $main->home_second_ad ,
        'home_number_banner' => $request->hasFile('home_number_banner') ? $fileName2 : $main->home_number_banner ,
        'home_advantage_first_icon' => $request->hasFile('home_advantage_first_icon') ? $fileName3 : $main->home_advantage_first_icon ,
        'home_advantage_second_icon' => $request->hasFile('home_advantage_second_icon') ? $fileName4 : $main->home_advantage_second_icon ,
        'home_advantage_third_icon' => $request->hasFile('home_advantage_third_icon') ? $fileName5 : $main->home_advantage_third_icon ,
        'home_advantage_fourth_icon' => $request->hasFile('home_advantage_fourth_icon') ? $fileName6 : $main->home_advantage_fourth_icon ,

        ] + $request->all();

        $main->update($requestArray);

        Session::flash('flash_message', 'main updated successfully!');
        return redirect()->route('main.index');
    }
}
