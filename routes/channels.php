<?php

use App\Models\NarasumberProfile\KeahlianPendukung;
use App\Models\NarasumberProfile\KeahlianUtama;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('message.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('room.{id}', function ($user, $id) {
    return true;
});
Broadcast::channel('room-info', function ($user) {
    return true;
});
Broadcast::channel('onlineuser', function ($user) {
    if ($user->roles->pluck('name')[0] == "narasumber") {
        $pendukungList = [];
        $utamaList = [];
        $pendukungs = $user->keahlianPendukung;
        $utamas = $user->keahlianUtama;
        foreach ($pendukungs as $value) {
            $ahli = KeahlianPendukung::find($value->id)->bidang;
            array_push($pendukungList, $ahli);
        }
        foreach ($utamas as $value) {
            $ahli = KeahlianUtama::find($value->id)->bidang;
            array_push($utamaList, $ahli);
        }
        return ['id' => $user->id, 'name' => $user->name, "role" => $user->roles->pluck('name')[0], "pendukung" => $pendukungList, "utama" => $utamaList];
    }

    return ['id' => $user->id, 'name' => $user->name, "role" => $user->roles->pluck('name')[0]];
});
