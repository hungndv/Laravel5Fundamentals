<?php
/**
 * Created by PhpStorm.
 * User: hungndv
 * Date: 11/8/2015
 * Time: 3:13 PM
 */

namespace Laravel5Fundatmentals\Http\Composers;


use Laravel5Fundatmentals\Article;
use Illuminate\Contracts\View\View;

class NavigationComposer
{
    public function compose(View $view)
    {
        $view->with('latest', Article::latest()->first());
    }
}