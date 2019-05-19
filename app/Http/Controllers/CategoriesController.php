<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Hash;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);//all();
        return view('manage.categories.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateWith([
            'display_name' => 'required|max:255',
            'name' => 'required|max:100|alpha_dash|unique:roles',
            'description' => 'sometimes|max:255',
            'password' => ['sometimes', 'confirmed']
          ]);
    
        $category = new Category();
        $category->display_name = $request->display_name;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->password = Hash::make($request->password);
        $category->save();

        if ($category->save()){
            return redirect()->route('categories.show', $category->id)->with('success', 'Category Created Successfully');
        } 
        else {
            return redirect()->route('categories.create')->with('danger', 'Sorry, a problem occured while creating the Category');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('manage.categories.show')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('manage.categories.edit')->withCategory($category);
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
        $this->validateWith([
            'display_name' => 'required|max:255',
            'description' => 'sometimes|max:255',
            'password' => ['sometimes', 'confirmed']
          ]);
    
        $category = Category::findOrFail($id);
        $category->display_name = $request->display_name;
        $category->description = $request->description;
        $category->password = Hash::make($request->password);
        $category->save();

        if ($category->save()){
            return redirect()->route('categories.show', $category->id)->with('success', 'Category Updated Successfully');
        } 
        else {
            return redirect()->route('categories.create')->with('danger', 'Sorry, a problem occured while updating the Category');
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
