<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChatInstance;
use App\Models\ChatMessage;
use App\Models\User;

class QueryController extends Controller
{
    public function viewQuery()
    {
        return view('admin.chat.index')->with([
            'chats' => ChatInstance::all(),
        ]);
    }
    public function newQuery()
    {
        return view('admin.chat.newQuery')->with([
            'chats' => ChatInstance::all(),
        ]);
    }
    public function acceptQuery(Request $request, $id)
    {
        $chat = ChatInstance::find($id);
        if(!$chat){
            $request->session()->flash('error', 'Query Cannot be accepted.');
            return redirect(url('admin/queries'));
        }
        $chat->update($request->only('assigned_to'));
        return redirect(url('admin/queries'));
    }
    public function openQuery($id)
    {
        $chat_instance_id = $id;

        return view('admin.chat.openQuery')->with([
            'instance' => ChatInstance::find($id),
            'messages' => ChatMessage::where('chat_instance_id', $chat_instance_id)->get(),
            'users' => User::all(),
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
        return redirect(url('admin/openQuery', $chat_instance_id));
    }
    public function closeQuery(Request $request, $id)
    {
        $chat = ChatInstance::find($id);
        if(!$chat){
            $request->session()->flash('error', 'Query Cannot be Closed.');
            return redirect(url('admin/queries'));
        }
        $chat->update($request->only('status'));
        return redirect(url('admin/queries'));
    }
}