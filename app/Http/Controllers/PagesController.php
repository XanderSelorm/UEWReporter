<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Input;
use DB;
use App\Category;

class PagesController extends Controller
{
    public function index()
    {
        if ( !is_null(Post::class) ) {    
            $posts = Post::latest()->with('category')->first() 
            ->filter( request( ['month', 'year'] ) )->orderBy('created_at', 'desc')
            ->paginate(5);
            
            return view('pages.index')->with(['posts' => $posts]);//, 'allPosts' => $allPosts]);
        }
        else {
            return view('pages.index')->with(['posts' => $posts]);
        }
    }

    // public function login(){
    //     return view('pages.login');
    // }

    public function notifications(){
        return view('pages.notifications');
    }


    public function search(Request $request){
        // $query = $request->input('frontSearch');

        // $posts = Post::where('title', 'LIKE', '%' . $query . '%')
        //     ->orWhere('body', 'LIKE', '%' . $query . '%')
        //     ->get();

        // if(count($posts) > 0) {
        //     return view('pages.search')->with('posts', $posts)->with('query', $query);
        // }
        
        // else {
        //     return view('pages.search')->withMessage('danger', 'No results found for your search query.');
        // }   

        $query = $request->get('frontSearch');

            $posts = Post::where('title', 'LIKE', '%' . $query . '%')
                ->orWhere('body', 'LIKE', '%' . $query . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            if(count($posts) > 0) {
                return view('pages.search')->with('posts', $posts)->with('query', $query);
            }
            else {
                return view('pages.search')->withMessage('danger', 'No results found for your search query.');
            }
        
    }

    public function discover() {
        $categories = Category::all();
        return view('pages.discover')->with('categories', $categories);//->with('query', $query);
    }

    //public function publishModal(){
    //    return view('partials.publishModal');
    //}
    
    // public function registration(){
    //     return view('pages.registration');
    // }

    public function basicPermission(){
        return view('partials.basicPermission');
    }
    public function crudPermission(){
        return view('partials.crudPermission');
    }
    
    //public function myContent(){
    //    return view('pages.myContent');
    //}

}
