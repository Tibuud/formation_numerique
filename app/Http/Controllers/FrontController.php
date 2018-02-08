<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

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
        $posts = Post::where("post_type", $type)
                      ->orderBy('date_start', "asc")
                      ->paginate(2);

        return view('front.showType', ['posts' => $posts, 'type' => $type]);
    }

    public function search(Request $request)
    {
        $this->validate($request, [
               'q' => "required",
          ]);

        $q = $request->q;

        $posts = Post::where('title', 'like', "%" . $q . "%")
                        ->orwhere('description', 'like', "%" . $q . "%")
                        ->orwhere('post_type', 'like', "%" . $q . "%")
                        ->paginate(5);

        // return view('front.searchResult', ['posts' => $posts, 'q' => $query]);
        return view('front.searchResult', compact('posts', 'q'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
           'email' => "required|email",
           'message' =>"required"
         ]);

        Mail::to('MyUsername@gmail.com')
          ->send(new Contact($request->except('_token')));

        return back()->with('mon_message', 'Votre message a bien été envoyé.');
    }
}
