<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MsgEvent;

class ChatController extends Controller
{
    public function chat(Request $request){
        event(new MsgEvent($request->msg));
        return response(["msg" => "msg sent"], 200);
    }
}
