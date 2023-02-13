<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    
    public function index(){
        $userId = Auth::user()->id;
        $posts = PostModel::where('user_id', $userId)->get();

        return view('post.index', compact('posts'));
        
    }
    

    public function post_view($id){
        $post = PostModel::find($id);
        return view('post.view', compact('post'));
    }

    public function post_create_view(){
        $today = Carbon::today();
        $postCount = Auth::user()->posts()->whereDate('published_at',$today)->count();
        if(!Auth::user()->is_premium_user && $postCount==2){
            session()->flash('error', 'You already reached the "<b>Free</b>" user post publish limit for today! You can publish 2 post in a day as a free user! Please try again tomorrow!');
            return redirect()->route('post.list');
        }
        return view('post.create')->with('datas', []);
    }
    public function post_create(Request $request){

        $rules = [
            'title' => 'required|unique:posts',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $published_at = Carbon::now();
            $postData = [
                'user_id'=>Auth::user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'active' => '1',
            ];

            if(Auth::user()->is_premium_user){
                if($request->has('published_at_date') && $request->has('published_at_time')){
                    $published_at = date("Y-m-d H:i:s", strtotime($request->published_at_date." ".$request->published_at_time));
                    if($published_at>Carbon::now()){
                        $postData['active'] = '0';
                    }
                }
            }

            $postData['published_at']=$published_at;

            
            $tournamentCreated = PostModel::create($postData);
            if ($tournamentCreated) {
                $request->session()->flash('success', 'Post successfully created!');
                return redirect()->route('post.list');
            }else{
                $request->session()->flash('error', 'Failed to create post!');
                return redirect()->route('post.list');
            }
            
        }
    }
}
