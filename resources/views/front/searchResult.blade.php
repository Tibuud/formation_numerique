@extends('layouts.master')

@section('content')

<h2>Résultat de votre recherche pour "{{$q}}"</h2>
@if(isset($posts))
{{$posts->appends(request()->only('q'))->links()}}
<ul>
@forelse($posts as $post)
  <li>
    <h3><a href="{{url('post', $post->id)}}">{{$post->title}}</a></h3>
      <div class="row">
        <div class="col-md-4">
          <img src="{{asset('images/'.$post->picture->link)}}" width="180" alt="">
        </div>
        <div class="col-md-8">
          <p>Type : {{$post->post_type}}</p>
          <p>Catégorie : {{$post->category->name}}</p>
          <p>Début : {{$post->date_start}}</p>
        </div>
      </div>
  </li>
@empty
  <li>
  Aucune formation / Aucun stage trouvé
  </li>
@endforelse
</ul>
{{$posts->appends(request()->only('q'))->links()}}
@endif
@endsection
