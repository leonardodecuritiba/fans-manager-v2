<?php

namespace App\Http\Controllers;

use App\Club;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClubsController extends Controller
{
    private $name = 'Clube';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Club = Club::with('admin')->get();
        $content = [
            'status'    => 1,
            'content'   => $Club,
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
        //VALIDAR ADMIN_ID?
        $Club = Club::create($data);
        $content = [
            'status'    => 1,
            'response'  => trans('messages.crud.MSS', ['name' => $this->name]),
            'content'   => $Club,
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
        $Club = Club::where('id',$id)->with('admin')->get();
        if(count($Club)){
            $content = [
                'status'    => 1,
                'content'   => $Club,
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
        //
        $Club = Club::find($id);
        if(count($Club)){
            $data = $request->all();
            $Club->update($data); //Club
            $content = [
                'status'    => 1,
                'response'  => trans('messages.crud.MUS', ['name' => $this->name]),
                'content'   => $Club,
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
        //
        $Club = Club::find($id);

        if(count($Club)){
            $Club->delete(); //Fans
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
