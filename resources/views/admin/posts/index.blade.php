@extends('layouts.app')

@section('content')
    
<div class="container-fliud">
  <div class="row">
    <div class="col-12">
      <h2>
        Elenco di tutti i posts
      </h2>
      <table class="table">
        <thead>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Slug</th>
          <th scope="col">Crated at</th>
        </thead>
        <tbody>
          @foreach ($posts as $post)
            <tr>
              <th scope="row">{{ $post->id }}</th>
              <td>{{ $post->title }}</td>
              <td>{{ $post->slug }}</td>
              <td>{{ $post->created_at }}</td>
            </tr>
          @endforeach
        </tbody>
      </table> 
    </div>
  </div>
</div>


@endsection