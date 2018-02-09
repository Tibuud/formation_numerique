<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('date_start', "asc")->paginate(7);

        return view('back.post.index', ['posts' => $posts]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('back.post.create', ['categories' => $categories]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        $im = $request->file('picture');

        $link = $request->file('picture')->store('/');

        $post->picture()->create([
          'link' => $link,
          'title' => $request->title_image?? $request->title
        ]);

        return redirect()->route('post.index')->with('message', 'Votre nouveau post à bien été enregistré.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('back.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('name', 'id')->all();

        return view('back.post.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        // Il faut repérer le post que l'on souhaite modifier
        $post = Post::find($id);

        $post->update($request->all()); //mettre à jour les données d'un  post_type

        $image = $request->file('picture');

        if (!empty($image)) {
            //faire quelque chose si $image existe
            if (count($post->picture) > 0) {
                Storage::disk('local')->delete($post->picture->link); //Supprime physiquement l'image
                $post->picture()->delete(); // supprimer l'information en base de donnée
            }

            // méthode store retourne un link hash sécurisé
            $link = $request->file('picture')->store('./');

            //mettre à jour la table picture pour le lien vers l'image dans la base de données
            $post->picture()->create([
                'link' => $link,
                'title' => $request->title_image ?? $request->title
            ]);
        }

        return redirect()->route('post.index')->with('message', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('post.index')->with('message', 'Votre post a bien été supprimé.');
    }
}
