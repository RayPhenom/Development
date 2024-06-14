<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\User;
use App\Comment;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Like;
use App\Models\Dislike;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        if($requested ->sortByComments && in_array($requested ->sortByComments, ['asc', 'desc'])){
            $post_query->orderBy('comments_count', '$requested ->sortByComments');
  
          }
        $data['posts'] = $post_query->orderBy('id', 'DESC')->paginate(5);
        return view('post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::orderBy('id', 'desc')->get();
        $data['tags'] = Tag::orderBy('id', 'desc')->get();
        return view('post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'category' => 'required',
            'tags' => 'required|array',
        ], [
            'category.required' => 'Please select a category',
            'tags.required' => 'Please select at least one tag',
        ]);

        if ($request->hasFile('image')) {
            $image=$request->file('image');


            $image_name=time().'.'.$image->extension();
            $image->move(public_path('post_images'), $image_name);
        }

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_name,
            'user_id'=>Auth::user()->id,
            'category_id'=> $request->category,
        ]);

        $post->tags()->sync($request->tags);

        return redirect()->route('post.index')->with('success', 'Post created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //on your index when you click view, it takes you on the post page for that selected post or clicked post on your table.
    public function show($id)
    {

        $post=  Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['post'] = Post::findOrFail($id);
        $data['categories'] = Category::orderBy('id', 'desc')->get();
        $data['tags'] = Tag::orderBy('id', 'desc')->get();
        return view('post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
