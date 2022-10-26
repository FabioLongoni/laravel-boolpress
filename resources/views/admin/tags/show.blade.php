@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      @foreach ($tag->posts as $post)
        <div class="col-4 py-2">
          <article>
            <a href="{{ route('admin.posts.show',$post)}}">
              <h3>
                {{ $post->title }}
              </h3>
              <p>
                {{ $post->content}}
              </p>
            </a>
          </article>
        </div>  
      @endforeach  
    </div>
  </div>

@endsection