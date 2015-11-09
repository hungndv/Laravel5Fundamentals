<?php

namespace Laravel5Fundatmentals\Http\Controllers;

use Carbon\Carbon;
use Laravel5Fundatmentals\Article;
//use Illuminate\Http\Request; // should use Request
use Laravel5Fundatmentals\Http\Requests\ArticleRequest;
//use Request;
use Laravel5Fundatmentals\Http\Requests;
use Laravel5Fundatmentals\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class ArticleController extends Controller
{
    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
        //$this->middleware('auth', ['except' => 'index']);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(){
        //Auth::user();
        //$articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        $articles = Article::latest('published_at')->publish()->get(); // scope function
        //return $articles; // return json
        $latest = Article::latest()->first();
        //return view('article.index', compact('articles'));
        return view('article.index', ['articles' => $articles, 'latest' => $latest]);
    }

/*    public function show($id){
        //dd($id);

        $article = Article::findOrFail($id);

        return view('article.detail', ['article' => $article]);
    }*/


    /**
     * @param Article $article
     * @return \Illuminate\View\View
     */
    public function show(Article $article){
        //dd($article);
        return view('article.show', ['article' => $article]);
    }

    public function create(){
//        if (Auth::guest()){
//            return redirect('article');
//        }
        $tags = Tag::lists('name', 'id'); // id is key
        return view('article.create', compact('tags'));
    }

    /**
     * @param Request $request
     * @return Redirect
     */
    public function store(ArticleRequest $request) {
        //Auth::user(); // The user is currently signed-in.

        //$input = Request::all();
        //$input = Request::get('title');
        //return $input;

        // eloquent auto protect sql injection
        //$article = new Article();
        //$article->title = $input['title'];
        //$input['published_at'] = Carbon::now();
        //Article::create($input);

        // WITH VALIDATION
        // validation 1
        // add(AddArticleRequest $request)
        //Article::create($request->all());


        // validation 2
/*        $this->validate($request, [
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date'
        ]);*/

        $article = Auth::user()->articles()->create($request->all());
        //$article->tags()->attach($request->input('tag_list'));
        $this->synTags($article, $request->input('tag_list'));

        //$article = Auth::user()->

        //$article = new Article($request->all());
        //Auth::user()->articles()->save($article);
        //Article::create($request->all());
        //\Session::flash('flash_message', 'Your article has been created.');
        //session()->flash('flash_message_important', true);
        return redirect('article')->with([
            'flash_message' => 'Your article has been created.',
            'flash_message_important' => true
        ]);
    }

    public function edit(Article $article){
        // Due to route model binding in RouteServiceProvider
        //$article = Article::findOrFail($id);
        $tags = Tag::lists('name', 'id');
        return view('article.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request){
        // auto validate from rules in ArticleRequest
        // if pass go here
        //$article = Article::findOrFail($id);
        $article->update($request->all());
        //$article->tags()->detach();
        //$article->tags()->sync($request->input('tag_list'));
        $this->synTags($article, $request->input('tag_list'));
        return redirect('article');
    }

    public function synTags(Article $article, Array $tags){
        $article->tags()->sync($tags);
    }

}
