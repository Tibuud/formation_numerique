@extends('layouts.master')

@section('content')
@include('back.post.partials.error')
<form class="form-group" action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
  <div class="col-lg-6">
  	<div class="form-group">
  		<label for="title">Le titre de votre nouveau Post</label>
  		<input type="text" class="form-control" name="title" id='title' value="@if (!empty(old('title'))) {{old('title')}} @else {{$post->title}} @endif">
  	</div>
  	<div class="form-group">
  		<label for="post_type">Type de post</label>
      <select class="form-control" id='post_type' name='post_type'>
  			<option value="formation" @if((old('post_type') == 'formation') || ($post->post_type == 'formation')) selected @endif>Formation</option>
  			<option value="stage" @if((old('post_type') == 'stage') || ($post->post_type == 'stage')) selected @endif>Stage</option>
  		</select>
  	</div>
  	<div class="form-group">
  		<label for="description">Description</label>
  		<textarea rows="5" id='description' class="form-control" name="description"> @if(!empty(old('description'))) {{old('description')}} @else {{$post->description}} @endif </textarea>
  	</div>
  	<div class="form-group">
  		<label for="category_id">Catégorie</label>
  		<select class="form-control" name="category_id" id='category_id'>
        @if(empty(old('category_id')))
          @if(empty($post->category->id))
            <option value="1000" selected>Aucun catégorie</option>
            @forelse($categories as $id => $name)
      			<option value="{{$id}}">{{$name}}</option>
      			@empty
      			@endforelse
          @else
            <option value="1000">Aucun catégorie</option>
            @forelse($categories as $id => $name)
            <option value="{{$id}}" @if($post->category->id == $id) selected @endif>{{$name}}</option>
            @empty
            @endforelse
          @endif
        @else
          @if(old('category_id') == 1000)
            <option value="1000" selected>Aucun catégorie</option>
            @forelse($categories as $id => $name)
            <option value="{{$id}}">{{$name}}</option>
            @empty
            @endforelse
          @else
            <option value="0">Aucun catégorie</option>
            @forelse($categories as $id => $name)
            <option value="{{$id}}" @if(old('category_id') == $id) selected @endif>{{$name}}</option>
            @empty
            @endforelse
          @endif
        @endif
  		</select>
  	</div>
    <div class="form-group">
  		<label for="price">Prix de la formation</label>
  		<input type="number" min="0.00" max="20000.00" step="0.01" class="form-control" name="price" id='price' @if (!empty(old('price'))) value='{{old('price')}}' @else value='{{$post->price}}' @endif>
  	</div>
  </div>
  <div class="col-lg-6">
  	<div class="form-group">
  		<label for="student_max">Nombre maxi d'élèves</label>
  		<input type="number" min='10' max='50' class="form-control" name="student_max" id='student_max' @if (!empty(old('student_max'))) value='{{old('student_max')}}' @else value='{{$post->student_max}}' @endif>
  	</div>
  	<div class="form-group">
  		<label for="date_start">Début de la formation</label>
  		<input type="datetime-local" class="form-control" name='date_start' id='date_start' @if (!empty(old('date_start'))) value='{{old('date_start')}}' @else value='{{$post->date_start_for_input}}' @endif>
  	</div>
  	<div class="form-group">
  		<label for="date_end">Fin de la formation</label>
  		<input type="datetime-local" class="form-control" name='date_end' id='date_end' @if (!empty(old('date_end'))) value='{{old('date_end')}}' @else value='{{$post->date_end_for_input}}' @endif>
  	</div>
  	<div class="form-group">
  		<label for='status'>Publier le post</label>
  		<div class="radio" id='status'>
  			<label><input type="radio" name="status" value='published' @if((old('status') =='published') || ($post->status =='published')) checked @endif>publier</label>
  		</div>
  		<div class="radio">
  			<label><input type="radio" name="status" value='unpublished' @if((old('status') =='published') || ($post->status =='unpublished')) checked @endif>dépublier</label>
  		</div>
  	</div>
    @if(isset($post->picture))
      <img src="{{asset('images/'.$post->picture->link)}}" width="150" alt="">
      <div class="form-group">
  		<label for="picture">Modifier votre image</label>
    @else
      <div class="form-group">
    		<label for="picture">Ajouter une image</label>
    @endif
  		  <input type="file" name="picture" value="{{old('picture')}}" id="picture">
  	  </div>
  	<button type="submit" class="btn btn-primary btn-lg">Ajouter ce post</button>
  </div>
</form>
@endsection
