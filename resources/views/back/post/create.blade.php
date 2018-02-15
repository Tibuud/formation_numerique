@extends('layouts.master')

@section('content')
@include('back.post.partials.error')
<form class="form-group" action="{{route("post.store")}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="col-lg-6">
  	<div class="form-group">
  		<label for="title">Le titre de votre nouveau Post</label>
  		<input type="text" class="form-control" name="title" id='title' value="{{old('title')}}">
  	</div>
  	<div class="form-group">
  		<label for="post_type">Type de post</label>
  		<select class="form-control" id='post_type' name='post_type'>
  			<option value="formation" @if(old('post_type') == 'formation') selected @endif>Formation</option>
  			<option value="stage" @if(old('post_type') == 'stage') selected @endif>Stage</option>
  		</select>
  	</div>
  	<div class="form-group">
  		<label for="description">Description</label>
  		<textarea rows="5" id='description' class="form-control" name="description">{{old('description')}}</textarea>
  	</div>
  	<div class="form-group">
  		<label for="category_id">Catégorie</label>
  		<select class="form-control" name="category_id" id='category_id'>
        <option value="1000">aucune</option>
  			@forelse($categories as $id => $name)
  			<option value="{{$id}}" @if(old('category_id') == $id) selected @endif>{{$name}}</option>
  			@empty
  			@endforelse
  		</select>
  	</div>
    <div class="form-group">
  		<label for="price">Prix de la formation</label>
  		<input type="number" min="0.00" max="20000.00" step="0.01" class="form-control" name="price" id='price' value="{{old('price')}}">
  	</div>
  </div>
  <div class="col-lg-6">

  	<div class="form-group">
  		<label for="student_max">Nombre maxi d'élèves</label>
  		<input type="number" min='10' max='50' class="form-control" name="student_max" id='student_max' value="{{old('student_max')}}">
  	</div>

    <div class="form-group">
  		<label for="date_only_from_date_start">Début de la formation</label>
      <input type="date" id='date_only_from_date_start' class="form-control" name="date_only_from_date_start" value='{{old('date_only_from_date_start')}}'>
      <input type="time" id='time_only_from_date_start' class="form-control" name="time_only_from_date_start" value='{{old('time_only_from_date_start')}}'>
  		<input type="datetime-local" id='date_start' name='date_start' value='{{old('date_start')}}' style="display: none;">
  	</div>

  	<div class="form-group">
  		<label for="date_only_from_date_end">Fin de la formation</label>
      <input type="date" id='date_only_from_date_end' class="form-control" name="date_only_from_date_end" value='{{old('date_only_from_date_end')}}'>
      <input type="time" id='time_only_from_date_end' class="form-control" name="time_only_from_date_end" value='{{old('time_only_from_date_end')}}'>
  		<input type="datetime-local"  name='date_end' id='date_end' value='{{old('date_end')}}' style="display: none;">
  	</div>

  	<div class="form-group">
  		<label for='status'>Publier le post</label>
  		<div class="radio" id='status'>
  			<label><input type="radio" name="status" value='published' @if(old('status')=='published') checked @endif>publier</label>
  		</div>
  		<div class="radio">
  			<label><input type="radio" name="status" value='unpublished' @if(old('status')=='unpublished') checked @endif>dépublier</label>
  		</div>
  	</div>
  	<div class="form-group">
  		<label for="picture">Ajouter un fichier</label>
  		<input type="file" name="picture" value="{{old('picture')}}" id="picture">
  	</div>
  	<button type="submit" id="submit" class="btn btn-primary btn-lg">Ajouter ce post</button>
  </div>
</form>
@endsection
@section('scripts')
    @parent
    <script src="{{asset('js/dateForm.js')}}"></script>
@endsection
