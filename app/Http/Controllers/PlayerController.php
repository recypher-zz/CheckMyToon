<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlayerController extends Controller
{
    public function getPlayerInfo(Request $request){
        $player_name = $request->get('player_name');
        $server = $request->get('server');

        $xivRequest = Http::get("https://xivapi.com/character/search?name=" . $player_name . "&server=" . $server);
        $player_data = json_decode($xivRequest->body());

        $xivServerList = Http::get("https://xivapi.com/servers/dc");
        $xivServers = json_decode($xivServerList);

        $player = $player_data->Results[0];

        $profileRequest = Http::get("https://xivapi.com/character/" . $player->ID);
        $profile = json_decode($profileRequest->body());


        return view('/player', [
            'xivServers'=> $xivServers,
            'player'    => $player,
            'profile'   => $profile,
        ]);
    }
}
