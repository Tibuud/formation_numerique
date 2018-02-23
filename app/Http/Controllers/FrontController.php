<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Cache;

class FrontController extends Controller
{
    public function index()
    {
        $prefix = request()->page?? '1';
        $key = 'book' . $prefix;

        $posts = Cache::remember($key, 60*24, function () {
            return Post::published()->with('picture', 'category')->orderBy('date_start', "asc")->take(2)->get();
        });

        return view('front.index', ['posts' => $posts]);
    }

    public function show(int $id)
    {
        $key = 'bookshow' . $id;

        $post = Cache::remember($key, 60*24, function () use ($id) {
            return Post::published()->with('picture', 'category')->find($id);
        });

        return view('front.show', ['post' => $post]);
    }

    public function showType(string $type)
    {
        $posts = Post::published()->with('picture', 'category')->where("post_type", $type)
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

        $posts = Post::research($q)
                      ->published()
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
