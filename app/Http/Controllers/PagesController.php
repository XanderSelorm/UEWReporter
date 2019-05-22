<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use App\Role;
use App\User;

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
