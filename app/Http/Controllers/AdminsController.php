<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Contact;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminsController extends Controller
{
    private $name = 'Administrador';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Admin = Admin::with('user.contact')->get();
        $content = [
            'status'    => 1,
            'content'   => $Admin,
        ];
        return response($content, $status = 200,[]);
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
        $data = $request->all();
        //Contact
        $Contact = Contact::create($data);
        $data['contact_id'] = $Contact->id;
        //User
        $User = User::create($data);
        $User->attachRole(2);  // Setando o admin do clube como Role Admin
        $data['user_id'] = $User->id;
        //Admin
        $Admin = Admin::create($data);
        $content = [
            'status'    => 1,
            'response'  => trans('messages.crud.MSS', ['name' => $this->name]),
            'content'   => $Admin,
        ];
        return response($content, $status = 200,[]);
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
        $Admin = Admin::where('id',$id)->with('user.contact')->get();
        if(count($Admin)){
            $content = [
                'status'    => 1,
                'content'   => $Admin,
            ];
        } else {
            $content = [
                'status'    => 0,
                'response'  => trans('messages.crud.MGE', ['name' => $this->name])
            ];
        }
        return response($content, $status = 200,[]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $Admin = Admin::find($id);
        if(count($Admin)){
            $data = $request->all();
            $Admin->user->contact->update($data); //Contatct
            $Admin->user->update($data); //User
            $Admin->update($data); //Admin
            $content = [
                'status'    => 1,
                'response'  => trans('messages.crud.MUS', ['name' => $this->name]),
                'content'   => $Admin,
            ];
        } else {
            $content = [
                'status'    => 0,
                'response'  => trans('messages.crud.MGE', ['name' => $this->name])
            ];
        }
        return response($content, $status = 200,[]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Admin = Admin::find($id);
        if(count($Admin)){
            $Admin->user->contact->delete(); //Contatct
            $Admin->user->delete(); //User
            $Admin->delete(); //Fans
            $content = [
                'status'    => 1,
                'response'  => trans('messages.crud.MDS', ['name' => $this->name])
            ];
        } else {
            $content = [
                'status'    => 0,
                'response'  => trans('messages.crud.MGE', ['name' => $this->name])
            ];
        }

        return response($content, $status = 200,[]);
    }
}
