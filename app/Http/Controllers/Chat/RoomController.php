<?php

namespace App\Http\Controllers\Chat;

use App\Events\JoinRoomEvent;
use App\Models\Chat;
use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\UserhasPaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index()
    {
        return Room::orderBy('bidang_code')->get();
    }
    public function getBidang($bidang_code)
    {
        $room = Room::where('bidang_code', $bidang_code)->get();
        $unreads = array();
        foreach ($room as $key => $value) {
            $unReadIds = Chat::select(DB::raw('`to` as room_id, count(`to`) as message_count'))
                ->where('to', $value->id)
                ->where('is_narasumber', false)
                ->where('read', false)
                ->groupBy('to')
                ->get();
            array_push($unreads, $unReadIds);
        }

        $room = $room->map(function ($val) use ($unreads) {
            foreach ($unreads as $key => $value) {
                $contactUnread = $value->where('room_id', $val->id)->first();
                if ($contactUnread) {
                    $val->unread = $contactUnread->message_count;
                }
            }
            if (!isset($val->unread)) $val->unread = 0;
            return $val;
        });

        return response()->json($room);
    }

    public function join(Request $request)
    {
        $room = Room::find($request->room['id']);
        // dd($room);
        $role = $request->role[0];
        $stat = 'nothing change';
        if ($role == 'narasumber') {
            if ($room->narasumber_id == null) {
                $room->narasumber_id = $request->user['id'];
                $room->narasumber_name = $request->user['name'];
                $room->save();
                $stat = 'narasumber updated';
            }
        } else if ($role == 'user') {
            if ($room->user_id == null) {
                $room->user_id = $request->user['id'];
                $room->user_name = $request->user['name'];
                $room->save();
                $stat = 'user updated';
            }
        } else {
            return;
        }
        // broadcast(new RoomEvent($message));
        broadcast(new JoinRoomEvent($room));
        return response()->json(['room' => $room, 'status' => $stat]);
    }

    public function exit(Request $request)
    {
        $room = Room::find($request->room['id']);
        // dd($room);
        $role = $request->role[0];
        $stat = [];
        if ($role == 'narasumber') {
            if ($room->narasumber_id != null) {
                $room->narasumber_id = null;
                $room->narasumber_name = null;
                array_push($stat, 'narasumber removed');
            }
        }
        if ($room->user_id != null) {
            $room->user_id = null;
            $room->user_name = null;
            array_push($stat, 'user removed');
        }
        $room->ticket = null;
        $room->save();
        broadcast(new JoinRoomEvent($room));
        return response()->json(['room' => $room, 'status' => $stat]);
    }

    public function getManyBidang(Request $request)
    {
        $rooms = [];
        $bidang = $request->bidang;
        foreach ($bidang as $value) {
            $room = Room::where('bidang_code', ($value['id'] - 1))->get();
            foreach ($room as $rm) {
                array_push($rooms, $rm);
            }
        }
        return $rooms;
    }
}
