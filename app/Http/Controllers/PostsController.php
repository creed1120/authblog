<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all Categories
        $categories = Category::all();
        // If no categories then redirect user with Info message
        if($categories->count() == 0)
        {
            $msg = 'Must have a category set. <a class="text-green-900 underline" href="'. route('category.create') .'">Create a Category</a>';
            // Flash message
            Session::flash('info', $msg);

            return redirect()->route('categories');
        }

        return view('posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        // Save Image
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
        ]);

        $post->save();

        Session::flash('success', 'Post Created Successfully!');

        return redirect()->back();

        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
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
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($id);

        if ($request->hasFile('featured'))
        {
            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/' . $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id =  $request->category_id;

        $post->save();

        Session::flash('success', 'Post Updated Successfully!');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'Post has been Trashed.');

        return redirect()->back();
    }

    // Soft Delete post to Trash
    public function trashed() {

        $posts = Post::onlyTrashed()->get();

        return view('posts.trashed', [
            'posts' => $posts
        ]);
    }

    // Permanantly delete post from trashed
    public function permanant($id) {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        Session::flash('success', 'Post deleted permanantly.');

        return redirect()->back();
    }

    // Restore trashed post
    public function restore($id) {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        $msg = 'Post <span class="text-green-900">"'. $post->title .'"</span> restored successfully.';

        Session::flash('success', $msg);

        return redirect()->route('posts');
    }

}
