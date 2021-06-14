<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\App\admin;

class AdminchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        $messages= Message::all();
        // $articles = App\admin ::find()->posts;
        return view('chatadmin',compact('users','messages'));
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
        //
        $request->validate([
            'answers'=>'required|string',
            'user_id'=>'required',
            'message_id'=>'required',
        ]);

            $answers= new Answers();
            $answers->answers=$request->input('answers');
            $answers->user_id=$request->input('user_id');
            $answers->message_id=$request->input('message_id');
            $answers->save();

            return "ok";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($users)
    {
        //$users=User::all("message")->where('id',$users);
        $allData = [];

        $messages = Message::all()->where("user_id", $users);
        $users = User::all();
        return view('chatadmin',["messages" => $messages, "users" => $users]);
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
    }
}
