<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Tag;
use App\Category;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* //Ordering your posts//
        $posts = Post::orderBy('title', 'asc')->get(); //ascending by title
        $posts = Post::orderBy('title', 'desc')->get(); //descending by title
        */
        //display all posts
        //$posts = Post::all();

        //Pagination
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        
        //Limiting number of posts
        //$posts = Post::orderBy('title', 'asc')->take(1)->get()

        //using SQL syntaxes 
        //$posts = DB::select('SELECT * FROM posts');

        //Creating an Archives Section
        

        return view('manage.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('manage.posts.create')->withTags($tags)->withCategories($categories);
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
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        $filenameToStore = "noimage.jpg";
        //Handle FIle Upload
        if($request->hasFile('cover_image')){
            //Get FIlename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just Ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
                }
        else {
            $fileNameToStore = "noimage.jpg";
        }

        //Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = Auth()->user()->id;
        $post->cover_image = $filenameToStore;
        $post->save();

        if ($request->tags) {
            $post->syncTags(explode(',', $request->tags));
        }

        return redirect('/manage/posts')->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->with(['tag', 'category'])->first();
        //$post = Post::where('id', $id)->with('tags')->first();
        // dd($post);
        //$post = DB::select('SELECT * FROM posts where id = "$id"');
        return view('manage.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->with('tag')->first();
        $tags = Tag::all();

        //Check for correct User
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view('manage.posts.edit')->withPost($post)->withTags($tags);
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
            'body' => 'required'
        ]);

        //Handle FIle Upload
        if($request->hasFile('cover_image')){
            //Get FIlename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just Ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }

        //Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        if($request->hasFile('cover_image')){
            $post->cover_image = $filenameToStore;
        }
        $post->save();

        if ($request->tags) {
            $post->syncTags(explode(',', $request->tags));
        }

        return redirect('/manage/posts')->with('success', 'Post Updated Successfully');
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

        //Check for correct User
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/manage/posts')->with('success', 'Post Removed Successfully');
    }
}
