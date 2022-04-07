<?php

namespace App\Http\Controllers;

use App\Models\AndyQuotes;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index() {

        $quotes = AndyQuotes::inRandomOrder()->limit(1)->get();
        $xivServerList = Http::get("https://xivapi.com/servers/dc");

        $xivServers = json_decode($xivServerList);

        return view('/homepage', [
            'xivServers'    => $xivServers,
            'quotes'  => $quotes,
        ]);
    }
}
