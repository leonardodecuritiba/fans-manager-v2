<?php

namespace App\Http\Controllers;

use App\Mail\ValidateFan;
use App\Contact;
use App\Fan;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\FansRequest;

use App\Http\Requests;

class FansController extends Controller
{
    private $name = 'Torcedor';
	public function visualizar()
    {
        return "OK! CHEGAMOS";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Fan = Fan::with('user.contact','club')->get();
        $content = [
            'status'    => 1,
            'content'   => $Fan,
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
        return view('pages.fans.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome($id)
    {
        $Fan = Fan::find($id);
        $content = [
            'status' => 1,
            'response' => trans('messages.crud.MSS', ['name' => $this->name]),
            'content' => $Fan,
        ];
        return view('pages.fans.welcome')
            ->with('content', $content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FansRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FansRequest $request)
    {
        $data = $request->all();
//        return $data;
        $Contact = Contact::create($data);
        $data['contact_id'] = $Contact->id;//Contatct
        $data['password'] = Hash::make($data['password']); //User
        $data['remember_token'] = str_random(60);
        $User = User::create($data);
        $User->attachRole(3);  // Setando o user do clube como Role Torcedor
        $data['user_id'] = $User->id;
        $Fan = Fan::create($data); //Fan
        $data['user_id'] = $User->id;
        $content = [
            'status'    => 1,
            'response'  => trans('messages.crud.MSS', ['name' => $this->name]),
            'content'   => $Fan,
        ];

        Mail::to($Fan->user->email)
            ->queue(new ValidateFan($Fan));

        if ($request->is('api/*')) {
            return response($content, $status = 200,[]);
        }
        return redirect()->to(['fans.welcome', $Fan->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Fan = Fan::where('id',$id)->with('user.contact','club')->first();
        if(count($Fan)){
            $content = [
                'status'    => 1,
                'content'   => $Fan,
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
     * Count specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
        $Count = Fan::count();
        $content = [
            'status'    => 1,
            'content'  => $Count
        ];

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
     * @param  FansRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FansRequest $request, $id)
    {
        $Fan = Fan::find($id);
        if(count($Fan)){
            $data = $request->all();
            $Fan->user->contact->update($data); //Contatct
            $Fan->user->update($data); //User
            $Fan->update($data); //Fans
            $content = [
                'status'    => 1,
                'response'  => trans('messages.crud.MUS', ['name' => $this->name]),
                'content'   => $Fan,
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
        $Fan = Fan::find($id);
        if(count($Fan)){
            $Fan->user->contact->delete(); //Contatct
            $Fan->user->delete(); //User
            $Fan->delete(); //Fans
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

    /**
     * Validate the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validate_fan($id,$token)
    {
        $Fan = Fan::find($id);
        if(count($Fan)){
            $Fan->validate($token);
            $content = [
                'status'    => 1,
                'response'  => trans('messages.crud.MVS', ['name' => $this->name]),
                'content'   => $Fan,
            ];
        } else {
            $content = [
                'status'    => 0,
                'response'  => trans('messages.crud.MGE', ['name' => $this->name])
            ];
        }
        return response($content, $status = 200,[]);
    }

    public function logar(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $user = User::where('username', $credentials['username'])->first();
        if(count($user)){
            if ($user->validated == 1) {
                if (Hash::check($credentials['password'], $user->password)) {
                    $content = [
                        'status' => 1,
                        'response' => trans('messages.crud.MLS', ['name' => $this->name]),
                        'content' => $user,
                    ];
                } else {
                    $content = [
                        'status' => 0,
                        'response' => trans('messages.crud.MLE')
                    ];
                }
            } else {
                $content = [
                    'status' => 0,
                    'response' => trans('messages.crud.MLVE')
                ];
            }

        } else {
            $content = [
                'status' => 0,
                'response' => trans('messages.crud.MLE')
            ];
        }
        return response($content, $status = 200,[]);

    }
}
