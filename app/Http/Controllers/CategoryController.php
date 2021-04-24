<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // $categories = Category::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'img' => $request->file('img')->store('public/img'),
        //     'user_id'=>Auth::id(),
        // ]);


        if ($request->img) {
            $category = Category::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'user_id' => Auth::id(),
                'img' => $request->file('img')->store('public/img'),
                
                ]);
        }else{
            $category = Category::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'user_id' => Auth::id(),
                
                ]);
        }


        return redirect(route('category.index'))->with('status', 'la categoria è stata creata');
    }

    /** 
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {

        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->img) {
            $category->img = $request->file('img')->store('public/img');
        }

        $category->save();


        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        foreach ($category->articles as $article) {

            $category->articles()->detach($article->id);
        }

        

        $category->delete();

        return redirect(route('category.index'));
    }


    public function auth($auth){
        $categories = Category::where('user_id', $auth)->get();
        $user= User::find($auth);
        return view('category.auth', compact('categories' , 'user'));
    }


}
