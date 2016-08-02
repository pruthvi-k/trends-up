<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use LRedis;

class ChatController extends Controller
{
    public function index()
    {
        return view('test-message');
    }

    public function writemessage()
    {
        return view('chat');
    }

    public function sendMessage(Request $request) //redis
    {
        $redis = LRedis::connection();
        $data = ['message' => $request->input('message'), 'user' => $request->input('user')];
        $redis->publish('message', json_encode($data));
        return response()->json([]);
    }

    public function send()
    {
        return response()->json(["u" => "hi"]);
    }

    public function write()
    {
        return view('test-message');
    }
}
