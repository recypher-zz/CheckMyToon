<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function getNews() {
        $articles = News::orderBy('created_at', 'desc')->paginate(8);

        $xivServerList = Http::get("https://xivapi.com/servers/dc");
        $xivServers = json_decode($xivServerList);

        return view('/news', [
            'xivServers' => $xivServers,
            'articles'   => $articles,
        ]);
    }
}
