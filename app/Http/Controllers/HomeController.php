<?php

namespace App\Http\Controllers;

use App\Models\AndyQuotes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $quotes = AndyQuotes::inRandomOrder()->limit(1)->get();

        return view('/homepage', [
            'quotes' => $quotes,
        ]);
    }
}
