<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticlesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class ArticlesController extends AdminController
{
    public function __construct(ArticlesRepository $a_rep)
    {
        parent::__construct();
        $this->a_rep = $a_rep;
        $this->template = env('THEME').'.admin.articles';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('VIEW_ARTICLES')) {
            abort(403);
        }
        $this->title = 'Менеджер статтей';

        $articles = $this->getArticles();
        $content = view(env('THEME').'.admin.articles_content')->with('articles', $articles)->render();
        $this->vars = array_add($this->vars, 'content', $content);
        
        return $this->renderOutput();
    }
    public function getArticles()
    {
        return $this->a_rep->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('save', new \App\Article)) {
            abort(403);
        }

        $this->title = "Добавить новый материал";

        $categories = Category::select(['title','alias','parent_id','id'])->get();

        $lists = array();

        foreach ($categories as $category) {
            if ($category->parent_id == 0) {
                $lists[$category->title] = array();
            } else {
                $lists[$categories->where('id', $category->parent_id)->first()->title][$category->id] = $category->title;
            }
        }

        $this->content = view(env('THEME').'.admin.articles_create_content')->with('categories', $lists)->render();

        return $this->renderOutput();
    }


    public function store(ArticleRequest $request)
    {
        $result = $this->a_rep->addArticle($request);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($alias)
    {
        if (Gate::denies('edit', new Article)) {
            abort(403);
        }
        $article = $this->a_rep->one($alias);
        $article->img = json_decode($article->img);


        $categories = Category::select(['title','alias','parent_id','id'])->get();

        $lists = array();

        foreach ($categories as $category) {
            if ($category->parent_id == 0) {
                $lists[$category->title] = array();
            } else {
                $lists[$categories->where('id', $category->parent_id)->first()->title][$category->id] = $category->title;
            }
        }

        $this->title = 'Реадактирование материала - '. $article->title;


        $this->content = view(env('THEME').'.admin.articles_create_content')->with(['categories' =>$lists, 'article' => $article])->render();

        return $this->renderOutput();
    }
    
    
    public function update(ArticleRequest $request, $alias)
    {
        $article = $this->a_rep->one($alias);
        $result = $this->a_rep->updateArticle($request, $article);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
    }


    public function destroy($alias)
    {
        $article = $this->a_rep->one($alias);
        $result = $this->a_rep->deleteArticle($article);

        if (is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
    }
}
