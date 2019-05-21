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

    public function showProfile($id){
        $roles = Role::all();
        $user = null;

        if($id != null) {
            $user = User::find($id);
        } else {
            $user = User::find(Auth::user()->id)->with('roles')->first();
        }
        return view('pages.profile')->withUser($user)->withRoles($roles);

        // $id = User::get('id');
        // $roles = Role::all();
        // $user = User::find($id)->with('roles')->first();
        // return view('pages.profile')->withUser($user)->withRoles($roles);
    }

    public function updateProfile(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => ['sometimes', 'digits:10'],
            'password' => ['confirmed'],
            'profile_picture' => 'image|nullable|max:1999'
        ]);

        $filenameToStore = "";
        //Handle FIle Upload
        if($request->hasFile('profile_picture')){
            //Get FIlename with the extension
            $filenameWithExt = $request->file('profile_picture')->getClientOriginalName();
            //Get just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just Ext
            $extension = $request->file('profile_picture')->getClientOriginalExtension();
            //Filename to Store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('profile_picture')->storeAs('public/profile_pictures', $filenameToStore);
        }
        else {
            $filenameToStore = "avatar.png";
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->profile_picture = $filenameToStore;
        
        if (!empty($request->password)) {
            $password = trim($request->password);
            $user->password = Hash::make($password);
        } 
        
        if ($user->save()) {
        return redirect()->route('profile', $id)->with('success', 'Profile Updated Successfully');
        } 
        else {
            return redirect()->route('profile', $id)->with('danger', 'Sorry, a problem occured while updating your profile');
        } 
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
