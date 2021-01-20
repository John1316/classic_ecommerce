<?php

namespace App\Http\Controllers\Backend;

use App\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreClientsRequest;
use App\Http\Requests\UpdateClientsRequest;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Client::latest()->paginate(10);

        return view('backend.clients.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientsRequest $request)
    {
        $requestArray = $request->all();

        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('clients'), $fileName);
        }

        $requestArray = ['logo' => $fileName] + $request->all();

        Client::create($requestArray);

        Session::flash('flash_message', 'Client added successfully!');
        return redirect()->route('clients.index');
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
        $row = Client::findorFail($id);
        return view('backend.clients.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientsRequest $request, $id)
    {
        $client = Client::findorFail($id);

        $requestArray = $request->all();

        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('clients'), $fileName);

            if($client->logo !== NULL) {
                if(file_exists(public_path('clients/'. $client->logo))) {
                    unlink(public_path('clients/'. $client->logo));
                }
            }
        }


        $requestArray = ['logo' => $request->hasFile('logo') ? $fileName : $client->logo] + $request->all();

        $client->update($requestArray);

        Session::flash('flash_message', 'Client updated successfully!');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $client = Client::findorFail($id);

        if($client->logo !== NULL) {
            if(file_exists(public_path('clients/'. $client->logo))) {
                unlink(public_path('clients/'. $client->logo));
            }
        }

        $client->delete();

        Session::flash('flash_message', 'Client deleted successfully!');
        return redirect()->route('clients.index');
    }
}
