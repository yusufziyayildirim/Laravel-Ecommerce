<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Redirect;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.insert_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $data = $this->prepare($request,$user->getFillable());
        $user->fill($data);
        $user->save();

        return Redirect::to(route('users.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.users.update_form', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $this->prepare($request,$user->getFillable());
        $user->fill($data);
        $user->save();

        return Redirect::to(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(["message"=>"done", "id"=>$user->user_id]);
    }


    /**
     * Show the form for changing password.
     *
     * @return \Illuminate\Http\Response
     */

    public function passwordForm(User $user)
    {
        return view('backend.users.password_form', ['user' => $user]);
    }



    public function changePassword(User $user, UserRequest $request)
    {
        $data = $this->prepare($request,$user->getFillable());
        $user->fill($data);
        $user->save();
        
        return Redirect::to(route('users.index'));
    }

}
