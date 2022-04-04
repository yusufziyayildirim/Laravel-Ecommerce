<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Redirect;
use App\Http\Requests\AddressRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $addrs = $user->addrs;
        return view('backend.addresses.index',['addrs' => $addrs , 'user'=>  $user->user_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('backend.addresses.insert_form' ,['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, AddressRequest $request)
    {
        $addr = new Address();
        $data = $this->prepare($request,$addr->getFillable());
        $addr->fill($data);
        $addr->save();

        return Redirect::to(route('addresses.index',['user'=> $user]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Address $address)
    {
        return view('backend.addresses.update_form', ['user' => $user, 'addr' => $address]);
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, User $user, Address $address)
    {
        $data = $this->prepare($request,$address->getFillable());
        $address->fill($data);
        $address->save();

        return Redirect::to(route('addresses.index',['user'=> $user]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,Address $address)
    {
        $address->delete();
        return response()->json(["message"=>"done", "id"=>$address->address_id ]);
    }
}
