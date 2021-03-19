<?php

namespace App\Http\Controllers\Chat;

use App\Events\JoinRoomEvent;
use App\Models\Ticket;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $name = '';
        $now = 'tm'.Carbon::now()->timestamp;
        $room = 'rm'.$request->id;
        $user = 'us'.$request->user_id;
        $nara = 'na'.$request->narasumber_id;
        $name = $room.$user.$nara.$now;
        
        $ticket = Ticket::create([
            'name' => $name,
            'room_id' => $request->id,
            'expired_at' => Carbon::now()->addMinutes(1)
        ]);
        $room = Room::find($request->id);
        $room->ticket = $name;
        $room->save();
        
        broadcast(new JoinRoomEvent($room));
        return response()->json(['ticket'=>$ticket, 'room'=>$room]);
    }

    public function show($name)
    {
        $ticket = Ticket::where('name',$name)->first();
        return response()->json(['ticket'=>$ticket]);
    }
}
