@extends('layouts.master')

@section('content')

<h2>Formulaire de contact</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('mon_message'))
  <div class="alert">
      <p>{{Session::get('mon_message')}}</p>
  </div>
@else
<form  action="{{url('sendEmail')}}" method="post" class="form-group">
  {{ csrf_field() }}
<div class="form-group">
  <label for="email">Votre email :</label>
  <input type="email" name="email" id="email" class="form-control" placeholder="email" value={{old("email")}}>
</div>
<div class="form-group">
  <label for="message">Votre message :</label>
  <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Saisissez votre message..." value={{old("message")}} ></textarea>
</div>
  <button type="submit">Envoyer</button>
</form>
@endif
@endsection
