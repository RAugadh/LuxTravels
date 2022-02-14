<?php

namespace App\Http\Controllers;

use App\Models\ChatInstance;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;
        return view('user.chat.index')->with([
            'chats' => ChatInstance::where('user_id', Auth::user()->id)->get(),
        ]);
    }


    public function sendMsg(Request $request, $chat_instance_id)
    {
        $chat_msg = $request->only([
            'user_id' => 'user_id',
            'message' => 'message',
            'chat_instance_id' => 'chat_instance_id',
        ]);
        $chat_msg['sent_at'] = now();
        ChatMessage::create($chat_msg);
        return redirect(route('user.chat.show', $chat_instance_id));
    }


    public function store(Request $request)
    {
        // dd($request);
        $newChatIns = new ChatInstance();
        $chat_in = $newChatIns->create($request->only([
            'user_id' => 'user_id',
            'subject' => 'subject'
        ]));
        // dd($chat_in->id);
        $chat_msg = $request->only([
            'user_id' => 'user_id',
            'message' => 'message',
        ]);
        $chat_msg['chat_instance_id'] = $chat_in->id;
        $chat_msg['sent_at'] = now();
        ChatMessage::create($chat_msg);
        return redirect(route('user.chat.index'));

    }
    public function show($id)
    {
        $chat_instance_id = $id;

        return view('user.chat.show')->with([
            'instance' => ChatInstance::find($id),
            'messages' => ChatMessage::where('chat_instance_id', $chat_instance_id)->get(),
            'users' => User::all(),
        ]);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}