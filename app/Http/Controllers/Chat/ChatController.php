<?php

namespace App\Http\Controllers;

use App\Events\RoomEvent;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public function index()
    {
        $contacts = User::where('id', '!=', auth()->id())->get();
        $unReadIds = Chat::select(DB::raw('`from` as sender_id, count(`from`) as message_count'))
        ->where('to', auth()->id())
        ->where('read', false)
        ->groupBy('from')
        ->get();

        $contacts = $contacts->map(function ($contact) use ($unReadIds)
        {
            $contactUnread = $unReadIds->where('sender_id', $contact->id)->first();
            $contact->unread = $contactUnread ? $contactUnread->message_count : 0;
            return $contact;
        });
        return response()->json($contacts);
    }

    public function getMessageFor(Request $request)
    {
        // $messages = Message::where('from', $id)->Where('to', auth()->id())->update(['read'=>true]);
        $messages = Chat::Where('to', $request->id)->update(['read'=>true]);
        $id = $request->id;
        $ticket = $request->ticket;
        $messages = Chat::where(function ($q) use ($id, $ticket)
        {
            $q->where('ticket', $ticket);
            $q->where('to', $id);
        })->get();
        // $messages = Message::where(function ($q) use ($id)
        // {
        //     $q->where('from', auth()->id());
        //     $q->where('to', $id);
        // })->orWhere(function ($q) use ($id)
        // {
        //     $q->where('from', $id);
        //     $q->where('to', auth()->id());
        // })->get();
        // $messages = Message::where('to', $id)->get();
        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $message = Chat::create([
            'from' => auth()->id(),
            'to' => $request->room_id,
            'text' => $request->text,
            'is_narasumber' => $request->isNarasumber,
            'file_name'=> $request->filename,
            'type'=> $request->filetype,
            'path'=> $request->filepath,
            'ticket'=> $request->ticket
        ]);

        // broadcast(new NewMessageEvent($message));
        broadcast(new RoomEvent($message));

        return response()->json($message);
    }

    public function uploadFile(Request $request)
    {
        $data = $request->all();
        $file = $request->file('file');
        $path = 'upload/sendMedia';
        $filename = $file->getClientOriginalName();
        
        $path = Storage::disk('public')->put(
            $path,
            $file
        );

        $media_url = $path;

        return response()->json([
            'status' => 'ok',
            'media_url' => Storage::url($path)
        ]);
    }
}
