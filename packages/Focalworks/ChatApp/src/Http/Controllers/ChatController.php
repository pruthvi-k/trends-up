<?php

namespace Focalworks\ChatApp\Http\Controllers;

use Focalworks\ChatApp\Events\ChatMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use LRedis;

class ChatController extends Controller
{
    public function writemessage()
    {
        return view("chat::window");
    }

    public function sendMessage(Request $request) //redis
    {
//        $redis = LRedis::connection();
        $data = [
            'message' => $request->input('message'),
            'user' => $request->input('user'),
            'to' => $request->input('to')
        ];

        //$redis->publish('message', json_encode($data));
//        $redis->publish('message_' . $request->input('user'), json_encode($data));
        event(new ChatMessage($data));
        return response()->json([]);
    }
}
