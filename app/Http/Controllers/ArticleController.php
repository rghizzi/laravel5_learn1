<?php

namespace App\Http\Controllers;



use App\Article;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;

class ArticleController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth'); //auth middleware is attached to all the controller
        $this->middleware('auth',['except' => ['index','show']]); //auth middleware is attached everywhere except the index method
       // $this->middleware('auth',['only' => 'create']); //auth middleware is attached only to create method
    }

    //
    public function index()

    {
        // GET EVERYTHING
        // $articles = Article::latest('published_date')->get();
        // QUERY
        // $articles = Article::latest('published_date')->where('published_date','<=',Carbon::now())->get();
        // SCOPING

        $username=Auth::user()["name"];

        $articles = Article::latest('published_date')->published()->get();
        return view('articles.index',compact('articles','username'));
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
        if(!Auth::guest()) {
            $tags = Tag::lists('name','id');

            return view('articles.create',compact('tags'));
        }
        else
        {
            return redirect('/articles');
        }

    }

    public function store(Requests\ArticleRequest $request)
    {

        $input = $request->all();

        $input['published_date']=Carbon::now();

        $input['user_id']=Auth::user()->id;

        //Auth::user()->articles()->create($request-All());

        $article = Article::create($input);

        $article->tags()->attach($request->input('tag_list'));

        \Session::flash('flash_message','Your article has been succesfully added');

        return redirect('articles');
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $tags = Tag::lists('name','id');


        return view('articles.edit',compact('article','tags'));
    }

    public function update($id, Requests\ArticleRequest $request)
    {
        $article = Article::findOrFail($id);

        $article->update($request->all());
        $article->tags()->sync($request->input('tag_list'));



        return redirect('articles');
    }

    public function destroy($id)
    {
        Article::destroy($id);
        return redirect('articles');

    }
}
