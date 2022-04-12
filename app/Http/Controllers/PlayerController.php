<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Goutte\Client;

class PlayerController extends Controller
{

    public function loadPlayerInfo(Request $request){

        // Get player info from search form
        $player_name = $request->get('player_name');
        $server = $request->get('server');

        // $this->getPlayerInfo($player_name, $server);

        return redirect(route('getPlayerInfo', ['player_name' => $player_name, 'server' => $server]));
    }

    public function getPlayerInfo($player_name, $server){

        // Request basic player data (playerID) from XIVAPI
        $xivRequest = Http::get("https://xivapi.com/character/search?name=" . $player_name . "&server=" . $server);
        $player_data = json_decode($xivRequest->body());
        
        if(isset($player_data->Error) == true) {
            $apiError = $player_data->Message;
            return view('/apierror', [
                'apiError' => $apiError
            ]);
        }else{
            $player = $player_data->Results[0];

            // Request data from CheckMyToonAPI
            $attributes = Http::get("http://niemergk.com:3000/character/" . $player->ID);
            $attributesData = json_decode($attributes);
        
            // Request Server data from XIVAPI to form list of current active servers
            $xivServerList = Http::get("https://xivapi.com/servers/dc");
            $xivServers = json_decode($xivServerList);

            // Request specific data form XIV API like avatar data
            $profileRequest = Http::get("https://xivapi.com/character/" . $player->ID);
            $profile = json_decode($profileRequest->body());
            

            return view('/player', [
                'attributesData' => $attributesData,
                'xivServers'    => $xivServers,
                'player'        => $player,
                'profile'       => $profile,
            ]);
        }

        
    }
}
