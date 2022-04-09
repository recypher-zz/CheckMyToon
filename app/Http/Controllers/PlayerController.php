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
        $player = $player_data->Results[0];

        // Request Server data from XIVAPI to form list of current active servers
        $xivServerList = Http::get("https://xivapi.com/servers/dc");
        $xivServers = json_decode($xivServerList);

        // Request specific data form XIV API like avatar data
        $profileRequest = Http::get("https://xivapi.com/character/" . $player->ID);
        $profile = json_decode($profileRequest->body());

        // Crawl the lodestone page to get the specifics
        $client = new Client();
        $url = "https://na.finalfantasyxiv.com/lodestone/character/". $player->ID . "/";

        $crawler = $client->request('GET', $url);
        $charProfile = [];
        $charProfile = $crawler->filter('.character-block')->each(function($node){
            return $node->text() . "\n";
        });

        return view('/player', [
            'charProfile'   => $charProfile,
            'xivServers'    => $xivServers,
            'player'        => $player,
            'profile'       => $profile,
        ]);
    }
}
