@extends('layouts.master')

@section('content')

<h2>Toutes les formations et toutes les stages</h2>
{{$posts->links()}}
<ul>
@forelse($posts as $post)
  <li>
    <h3><a href="{{route('post', $post->id)}}">{{$post->title}}</a></h3>
      <div class="row">
        <div class="col-md-4">
          @if(isset($post->picture))
          <img src="{{asset('images/'.$post->picture->link)}}" width="180" alt="">
          @endif
        </div>
        <div class="col-md-8">
          <p>Type : {{$post->post_type}}</p>
          @if(isset($post->category))
          <p>Catégorie : {{$post->category->name}}</p>
          @endif  
          <p>Début : {{$post->date_start}}</p>
        </div>
      </div>
  </li>
@empty
  <li>
  Aucune formation / Aucun stage actuellement
  </li>
@endforelse
</ul>
{{$posts->links()}}
@endsection
