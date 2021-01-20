<?php

namespace App\Http\Controllers\BackEnd;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateUserRequest;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role === 'super-admin') {
            $rows = User::latest()->where('role', '!=', 'user')->paginate(10);
            return view('backend.admins.index', compact('rows'));
        }
        abort(403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role === 'super-admin') {
            return view('backend.admins.create');
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
       User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['mobile'],
            'password' => Hash::make($request['password']),
            'role' => $request->role,
       ]);

       Session::flash('flash_message', 'Admin Added successfully!');
       return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(auth()->user()->role === 'super-admin') {
        //     $row = User::findorFail($id);
        //     return view('backend.admins.edit', compact('row'));
        // }
        // abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findorFail($id);

        $user->update([
            'name' => $request['name'],
            'phone' => $request['mobile'],
       ]);

       Session::flash('flash_message', 'Admin updated successfully!');
       return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorFail($id);
        $user->delete();

        Session::flash('flash_message', 'Admin deleted successfully!');
        return redirect()->route('admins.index');
    }
}
