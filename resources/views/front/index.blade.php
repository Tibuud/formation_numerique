@extends('layouts.master')

@section('content')

<h2>Toutes les formations et toutes les stages</h2>

<ul class='list-group'>
@forelse($posts as $post)
  <li class='list-group-item'>
    <h3><a href="{{route('post',[ $post->id, $post->slug])}}">{{$post->title}}</a></h3>
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
          @else
          <p>Catégorie : Auncune</p>
          @endif
          <p>Début : {{$post->date_start_fr}}</p>
        </div>
      </div>
  </li>
@empty
  <li>
  Aucune formation / Aucun stage actuellement
  </li>
@endforelse
</ul>

@endsection
