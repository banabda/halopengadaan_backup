<?php

namespace App\Http\Controllers\Chat;

use App\Events\RoomEvent;
use App\Models\Chat;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;

class ChatController extends Controller
{
    public function messages()
    {
        return Chat::all();
    }

    public function index()
    {
        $contacts = User::where('id', '!=', auth()->id())->get();
        $unReadIds = Chat::select(DB::raw('`from` as sender_id, count(`from`) as message_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        $contacts = $contacts->map(function ($contact) use ($unReadIds) {
            $contactUnread = $unReadIds->where('sender_id', $contact->id)->first();
            $contact->unread = $contactUnread ? $contactUnread->message_count : 0;
            return $contact;
        });
        return response()->json($contacts);
    }

    public function getMessageFor(Request $request)
    {
        // $messages = Message::where('from', $id)->Where('to', auth()->id())->update(['read'=>true]);
        $messages = Chat::Where('to', $request->id)->update(['read' => true]);
        $id = $request->id;
        $ticket = $request->ticket;
        $messages = Chat::where(function ($q) use ($id, $ticket) {
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
            'file_name' => $request->filename,
            'type' => $request->filetype,
            'path' => $request->filepath,
            'ticket' => $request->ticket
        ]);

        // broadcast(new NewMessageEvent($message));
        broadcast(new RoomEvent($message));

        return response()->json($message);
    }

    public function uploadFile(Request $request)
    {
        $file = $request->file('file');
        if (@is_array(getimagesize($file))) {
            $input['imagename'] = time() . '.' . $file->extension();
            $destinationPath = storage_path() . '/app/public/upload/sendMedia/' . $input['imagename'];
            $img = Image::make($file->path());
            $img->resize(750, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath);

            $url = 'upload/sendMedia/' . $input['imagename'];
        } else {
            $path = 'upload/sendMedia';
            $path = Storage::disk('public')->put(
                $path,
                $file
            );
            $url = Storage::url($path);
        }
        return response()->json([
            'status' => 'ok',
            'media_url' => $url
        ]);
    }
}
