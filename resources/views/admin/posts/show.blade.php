@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
      <h1>{{ $post->title }}</h1>
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
<div class="container">
  <p>
    {{ $post->content }}
  </p>
</div>

@endsection