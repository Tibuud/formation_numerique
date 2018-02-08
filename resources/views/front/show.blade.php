@extends('layouts.master')

@section('content')

<h2>{{$post->title}}</h2>
<div class="row">
  <div class="col-md-5">
    <div class="row">
      @if(isset($post->picture))
      <img src="{{asset('images/'.$post->picture->link)}}" width="250" alt="">
      @endif
    </div>

        <p>Début : {{$post->date_start}}</p>
        <p>Fin : {{$post->date_start}}</p>
        <p>Prix : {{$post->price}}€</p>
        <p>Nombre d'élève maxi : {{$post->student_max}}</p>


  </div>
  <div class="col-md-7">
    <p>{{$post->description}}</p>
  </div>


</div>



@endsection
