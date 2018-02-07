@extends('layouts.master')

@section('content')

<h2>Toutes les formations et toutes les stages</h2>
{{$posts->links()}}
<table class="table table-bordered table-striped table-responsive">
    <thead>
      <tr>
        <th>Titre</th>
        <th>Type</th>
        <th>Catégorie</th>
        <th>Prix</th>
        <th>Élèves maxi</th>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>Status</th>
        <th>Show</th>
        <th>Éditer</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody>
@forelse($posts as $post)
      <tr>
        <td>{{$post->title}}</td>
        <td>{{$post->post_type}}</td>
        <td>{{$post->category->name}}</td>
        <td>{{$post->price}}€</td>
        <td>{{$post->maw_students}}</td>
        <td>{{$post->date_start}}</td>
        <td>{{$post->date_end}}</td>
        <td>{{$post->status}}</td>
        <td><a href="{{route('post.show', $post->id)}}">voir</a></td>
        <td><a href="{{route('post.edit', $post->id)}}">éditer</a></td>
        <td>
            <form action="{{ route('post.destroy', $post->id) }}" method="post" class='delete'>
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
              <button type="submit" >delete</button>
            </form>
        </td>
      </tr>
    @empty
      </tbody>
    </table>
    	<div class="col-md-12">Aucun post présent dans la base de donnée</div>
    </div>
    @endforelse
  </tbody>
</table>
{{$posts->links()}}
@endsection
