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
use Auth;
use App\CategorySubscription;

class PagesController extends Controller
{
    public function index()
    {
        if ( !is_null(Post::class) ) {
            $user = Auth::user();            

            // $subscribe = $user->categorySubscriptions()->where('category_id', $category_id)->first();
           
            //If user is not logged in, display only general announcements.
            if(!Auth::user()){
                $gen_ann_posts = Post::latest()->where('category_id',1) 
                ->filter( request( ['month', 'year'] ) )->orderBy('created_at', 'desc')
                ->paginate(5);
                return view('pages.index')->with(['gen_ann_posts' => $gen_ann_posts]);
            }


            $cat_subs = CategorySubscription::select('category_id')->where('user_id','=' ,$user->id); 
            $category_id = Category::find('id', );

            //If User is logged in, display variety of posts
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

        $query = $request->input('srch-term');

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
        $user = Auth::user();
        $categories = Category::all();
        $cat_subs = CategorySubscription::where('user_id', $user->id)->get(); 
        $user_sub = $user->categorySubscriptions->all(); 
        // dd($user_sub);
        $isSubscribed = 0;
        if(count($cat_subs) >0) {
            $isSubscribed = 1;
        }
        else {
            $isSubscribed = 0;
        }
        
        // dd($isSubscribed);
        return view('pages.discover')->with('categories', $categories)->withUser($user)->with('cat_subs', $cat_subs)->with('isSubscribed', $isSubscribed)->with('user_sub', $user_sub);
    }

    public function categoryPosts($id) 
    {
        $category = category::where('id', $id)->first();
        $posts = Post::where('category_id', $id)->with('category')->paginate(5);
        return view('pages.categories')->withPosts($posts)->withCategory($category);
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
