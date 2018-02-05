<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class FrontController extends Controller
{
    // public function __construct()
    // {
    //     //méthode pour injecter des données à une vue partielle
    //     view()->composer('partials.menu', function ($view) {
    //         $categories = Category::pluck('name')->all();
    //         dump($categories);
    //         $view->with('categories', $categories);// on passe les données à la view
    //     });
    // }

    public function index()
    {
        $posts = Post::orderBy('date_start', "asc")->paginate(2);

        return view('front.index', ['posts' => $posts]);
    }

    public function show(int $id)
    {
        $post = Post::find($id);

        return view('front.show', ['post' => $post]);
    }

    public function showType(string $type)
    {
        $posts = Post::where("post_type", $type)->orderBy('date_start', "asc")->paginate(2);

        return view('front.showType', ['posts' => $posts, 'type' => $type]);
    }
}
