<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$roles = Role::all();
        $user = User::where('id', $id)->with('roles')->first();

        //$user = User::find(Auth::user()->id)->with('roles')->first();
        
        return view('pages.profile')->withUser($user);//->withRoles($roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->hasFile('profile_picture')){
            $user->profile_picture = $filenameToStore;
        }
        
        if (!empty($request->password)) {
            $password = trim($request->password);
            $user->password = Hash::make($password);
        } 
        
        if ($user->save()) {
        return redirect()->route('profile.show', $id)->with('success', 'Profile Updated Successfully');
        } 
        else {
            return redirect()->route('profile.show', $id)->with('danger', 'Sorry, a problem occured while updating your profile');
        }
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
