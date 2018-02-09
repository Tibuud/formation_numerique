@extends('layouts.master')

@section('content')
  <h2>Toutes les {{$type}}s</h2>
  {{$posts->links()}}
  <ul class='list-group'>
  @forelse($posts as $post)
    <li class='list-group-item'>
      <h3><a href="{{url('post', $post->id)}}">{{$post->title}}</a></h3>
        <div class="row">
          <div class="col-md-4">
            @if(isset($post->picture))
            <img src="{{asset('images/'.$post->picture->link)}}" width="180" alt="">
            @endif
          </div>
          <div class="col-md-8">
            <p>Description : {{$post->description}}</p>
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
    {{$posts->links()}}
@endsection
