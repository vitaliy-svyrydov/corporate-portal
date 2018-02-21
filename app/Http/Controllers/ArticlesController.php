<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository;
use App\Repositories\PortfoliosRepository;


class ArticlesController extends SiteController
{
    public function __construct(PortfoliosRepository $p_rep, ArticlesRepository $a_rep)
    {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu));

        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;

        $this->bar = 'right';

        $this->template = env('THEME').'.articles';

    }
    public function index()
    {
        $articles = $this->getArticles();
        return $this->renderOutput();
    }
    public function getArticles($alias = FALSE){

        $articles = $this->a_rep->get(['id','title','img','alias','created_at','desc','user_id', 'category_id'], FALSE, TRUE);
        $content = view(env('THEME').'.articles_content')->with('articles', $articles)->render();
        $this->vars = array_add($this->vars,'content', $content);
        
        if($articles)
        {
            //$articles->load('user','category','comments');
        }
        return $articles;
    }
}
