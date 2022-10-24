@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
      <h1>Modifica post</h1>
    </div>
  </div>
</div>
<div class="container-fluid">
  <form action="{{ route('admin.posts.update',$post) }}" method="POST">
  
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">Titolo</label>
      <input type="tecy" class="form-control @error('title')is-invalid @enderror" id="title" value="{{ old('title',$post->title) }}" name="title" aria-describedby="helpTitle">
      <small id="helpTitle" class="form-text text-muted">Titolo</small>

      @error('title')
        <div id="title" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror

    </div>

    
    <div class="form-group">
      <label for="content">Inserisci testo</label>
      <textarea class="form-control  @error('content')is-invalid @enderror" id="content" name="content" rows="18">{{ old('content',$post->content)}}</textarea>
      @error('content')
        <div id="title" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Modifica</button>
  </form>
</div>
@endsection