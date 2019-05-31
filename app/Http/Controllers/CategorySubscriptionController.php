<?php

namespace App\Http\Controllers;

use App\CategorySubscription;
use Illuminate\Http\Request;

class CategorySubscriptionController extends Controller
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
    public function store(Request $request, Category $category)
    {
        $category->subscribe();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategorySubscription  $categorySubscription
     * @return \Illuminate\Http\Response
     */
    public function show(CategorySubscription $categorySubscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategorySubscription  $categorySubscription
     * @return \Illuminate\Http\Response
     */
    public function edit(CategorySubscription $categorySubscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategorySubscription  $categorySubscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategorySubscription $categorySubscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategorySubscription  $categorySubscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorySubscription $categorySubscription)
    {
        $categorySubscription->unsubscribe();
    }
}
