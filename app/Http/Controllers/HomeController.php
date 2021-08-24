<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use App\User;
use App\NewsCategory;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function homeNews(){
        $news = News::all();

        foreach($news as $n){
            $author = User::find($n->user_id);
            $newsCategory = NewsCategory::find($n->id);
            $category = Category::find($newsCategory->category_id);

            $n->author = $author->name;
            $n->category = $category->name;
        }

        return view('welcome', compact('news'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
