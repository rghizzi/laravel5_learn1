<?php

namespace App\Http\Controllers;



use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;

class ArticleController extends Controller
{
    //
    public function index()

    {
        // GET EVERYTHING
        // $articles = Article::latest('published_date')->get();
        // QUERY
        // $articles = Article::latest('published_date')->where('published_date','<=',Carbon::now())->get();
        // SCOPING

        $articles = Article::latest('published_date')->published()->get();
        return view('articles.index',compact('articles'));
    }

    public function show($id)

    {
        $article = Article::find($id); //CAN USE FIND OR FAIL
        //dd($article);
        if(!$article)
        {
            abort(404);
        }
        return view('articles.show',compact('article'));
    }


    public function create()
    {
        return view('articles.create');

    }

    //VALDIATION WITH Requests\CreateArticleRequest $request
    public function store(Requests\ArticleRequest $request)
    {

        $input = $request->all();

        $input['published_date']=Carbon::now();

        //need to check if authorized
        $input['user_id']=Auth::user()->id;

        Article::create($input);

        return redirect('articles');
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.edit',compact('article'));
    }

    public function update($id, Requests\ArticleRequest $request)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());



        return redirect('articles');
    }
}
