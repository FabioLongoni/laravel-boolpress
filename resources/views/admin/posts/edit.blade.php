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
      <label for="category">Categoria</label>
      <select name="category_id" class="custom-select  @error('category_id')is-invalid @enderror">
        <option value="">-- nessuna --</option>
        @foreach ($categories as $category)
          <option @if(old('category_id',$post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>    
        @endforeach
      </select>
      <small id="helpCategory" class="form-text text-muted">Selezionare la categoria</small>
      @error('category_id')
          <div id="category" class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="" class="d-block">Tag</label>

      @foreach ($tags as $tag)
        <div class="form-check form-check-inline">
          <input class="form-check-input" name="tags[]" 
            @if( in_array($tag->id, old('tags',$post->tags->pluck('id')->all()))) checked @endif
            type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}">
          <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
        </div>    
      @endforeach 

      @error('tags')
        <div id="category" class="text-danger">
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