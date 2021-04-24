<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Color;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
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
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {

        // $category = Category::find($request->category);


        // $category->articles()->create([

        //     'name' => $request->input('name'),
        //     'price' => $request->input('price'),
        //     'description' => $request->input('description'),
        //     'img' => $request->file('img')->store('public/img'),
        //     'user_id' => Auth::id(),
        // ]);

        if ($request->img) {
            $article = Article::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'user_id' => Auth::id(),
                'img' => $request->file('img')->store('public/img'),
                
                ]);
        }else{
            $article = Article::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'user_id' => Auth::id(),
                
                ]);
        }



        if ($request->categories) {
            foreach ($request->categories as $category) {
                $article->categories()->attach($category);
            }
        }


        return redirect(route('article.index'))->with('status', 'la categoria è stata creata');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {

        $colors = Color::all();

        return view('article.show', compact('article' , 'colors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('article.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, article $article)
    {

        $article->name = $request->name;
        $article->price = $request->price;
        $article->description = $request->description;

        if ($request->img) {
            $article->img = $request->file('img')->store('public/img');
        }

        $article->save();


        
        if ($article->categories) {
            
            if (count($article->categories) > 0) {
                $article->categories()->detach();     
            }

            foreach ($request->categories as $category) {
                $article->categories()->attach($category);
            };
        }

        return redirect(route('article.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        foreach ($article->categories as $category) {

            $article->categories()->detach($category->id);
        }

        if ($article->colors) {
            
            if (count($article->colors) > 0) {
                $article->colors()->detach();     
            }
        }


        $article->delete();

        return redirect(route('article.index'));
    }

    public function auth($auth)
    {
        $articles = Article::where('user_id', $auth)->get();
        $user = User::find($auth);

        return view('article.auth', compact('articles', 'user'));
    }

    public function colors(Request $request , Article $article){
    

        if ($article->colors) {
            
            if (count($article->colors) > 0) {
                $article->colors()->detach();     
            }
        
        $article->colors()->attach($request->color);
        }

        return redirect()->back();

    }

}
