<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNews() {
        $articles = News::paginate(8);

        return view('/news', [
            'articles' => $articles,
        ]);
    }
}
