@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">

    @if ($post->cover)
      <div class="col-12">
        <img src="{{ asset('storage/'.$post->cover) }}" width="400" alt="">
      </div>        
    @endif

    <div class="col-8">
      <h1>{{ $post->title }}</h1>
      <p>{{ $post->slug }}</p>

      @if ($post->category)
        <p>Categoria: {{ $post->category->name }}</p>    
      @endif

      <ul>
        @foreach ($post->tags as $tag)
            <li>{{ $tag->name}}</li>
        @endforeach
      </ul>
      <span>Creato il: {{ $post->created_at }}</span>
      <span>Aggiornato il: {{ $post->updated_at }}</span>

    </div>
    <div class="col-4 text-left d-flex justify-content-end align-items-center">
      <a href="{{ route('admin.posts.edit',$post) }}" type="button" class="btn btn-primary btn-sm">Modifica post</a>

      <form action="{{ route('admin.posts.destroy',$post) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Elimina post" class="btn btn-danger btn-sm">
      </form>
      
    </div>  
  </div>
</div>
<div class="container py-3">
  <p>
    {{ $post->content }}
  </p>
</div>



@endsection