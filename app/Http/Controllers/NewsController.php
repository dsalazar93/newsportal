<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\News;
use App\User;
use App\NewsCategory;
use App\Category;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::where('user_id', Auth::id())->get();

        foreach($news as $n){
            $newsCategory = NewsCategory::where('news_id', $n->id)->get();
            $category = Category::find($newsCategory[0]->category_id)->get();  
            
            $n->author = Auth::user()->name;
            $n->category = $category[0]->name;
        }

        return view('mynews', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('newnews', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'content' => 'required|min:144',
            'category' => 'required'
        ],[
            'title.required' => 'El título de la noticia es requerido',
            'title.min' => 'El título debe tener por lo menos 3 caracteres',
            'content.required' => 'El contenido de la noticia es obligatorio',
            'content.min' => 'Tu noticia debe tener mas de 144 caracteres',
            'category.required' => 'Debes seleccionar una sección'
        ])->validate();

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->user_id = Auth::id();
        if($request->image){
            $news->image = $request->file('image')->store('images', 'public');
        }
        $newsSaved = $news->save();

        if ($newsSaved){
            $newsCategory = new NewsCategory();
            $newsCategory->news_id = $news->id;
            $newsCategory->category_id = $request->category;
            $newsCategorySaved = $newsCategory->save();

            if($newsCategorySaved){
                return redirect()->route('my_news')->with('success', 'Tu noticia ha sido guardada');
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($news_id)
    {
        $news = News::find($news_id);

        $author = User::find($news->user_id);
        $newsCategory = NewsCategory::where('news_id', $news->id)->get();
        $category = Category::find($newsCategory[0]->category_id)->get();  
        
        $news->author = $author->name;
        $news->category = $category[0]->name;

        return view('news', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($news_id)
    {
        $news = News::find($news_id);
        $newsCategory = NewsCategory::where('news_id', $news_id)->get();
        $news->category = $newsCategory[0]->id;
        $categories = Category::all();

        return view('editnews', compact('news', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'content' => 'required|min:144',
            'category' => 'required'
        ],[
            'title.required' => 'El título de la noticia es requerido',
            'title.min' => 'El título debe tener por lo menos 3 caracteres',
            'content.required' => 'El contenido de la noticia es obligatorio',
            'content.min' => 'Tu noticia debe tener mas de 144 caracteres',
            'category.required' => 'Debes seleccionar una sección'
        ])->validate();

        $news = News::find($request->id);
        $news->title = $request->title;
        $news->content = $request->content;
        if($request->image){
            $news->image ? Storage::disk('public')->delete($news->image) : true;
            $news->image = $request->file('image')->store('images', 'public');
        }
        $newsSaved = $news->save();

        if ($newsSaved){
            $newsCategory = new NewsCategory();
            $newsCategory->news_id = $news->id;
            $newsCategory->category_id = $request->category;
            $newsCategorySaved = $newsCategory->save();

            if($newsCategorySaved){
                return redirect()->route('my_news')->with('success', 'Tu noticia ha sido actualizada');
            }
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($news_id)
    {
        $newsCategoryDeleted = NewsCategory::where('news_id', $news_id)->delete();
        if ($newsCategoryDeleted){
            $news = News::find($news_id);
            Storage::disk('public')->delete($news->image);
            $newsDeleted = News::destroy($news_id);
            if($newsDeleted){
                return redirect()->route('my_news')->with('success', 'Tu noticia ha sido eliminada');
            }
        }
    }
}
