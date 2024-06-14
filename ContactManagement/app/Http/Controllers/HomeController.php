<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $requested)
    {
        $data['categories'] = Category::orderBy('id', 'desc')->get();
        $post_query = Post::where('user_id', auth()->id());

        if($requested ->category){
            $post_query->whereHas('category_id', function($q) use($requested){
                $q->where('name', $requested->category);
            });
        }
        if($requested ->keyword){
          $post_query->where('title', 'LIKE', '%'.$requested->keyword.'%');

        }
        $data['posts'] = $post_query->orderBy('id', 'DESC')->paginate(2);
        return view('post.index', $data);
    }

}