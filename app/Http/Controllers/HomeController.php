<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $posts = PostModel::where('active', '1')
        ->where('published_at','<',Carbon::now())->get();
        return view('index', compact('posts'));
    }
}
