@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
      <h1>Crea un nuovo post</h1>
    </div>
  </div>
</div>
<div class="container-fluid">
  <form action="{{ route('admin.posts.store') }}" method="POST">
  
    @csrf
    <div class="form-group">
      <label for="name">Titolo</label>
      <input type="tecy" class="form-control @error('title')is-invalid @enderror" id="title" value="{{ old('title') }}" name="title" aria-describedby="helpTitle">
      <small id="helpTitle" class="form-text text-muted">Titolo</small>

      @error('title')
        <div id="title" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror
    </div>
    <div class="form-group">
      <label for="content">Inserisci testo</label>
      <textarea class="form-control" id="content" name="content" rows="18">{{ old('content')}}</textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Crea</button>
  </form>
</div>
@endsection