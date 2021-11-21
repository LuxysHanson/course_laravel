<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $latestNews = DB::table('news')->where([
            'is_moderate' => 0
        ])->orderBy('created_at', 'DESC')->limit(3)->get()->all();

        return view('index')->with('latestNews', $latestNews);
    }

}
