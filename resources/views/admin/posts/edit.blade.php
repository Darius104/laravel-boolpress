@extends('layouts.dashboard')

@section('content')
    <section>
        <h2>Modifica post</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ? old('title') : $post->title }}">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Title</label>
                <select class="form-select" id="category_id" name="category_id">
                    <option value="">Nessuna</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"{{ old('category_id', $post->category->id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <h3>Tags</h3>
                @foreach ($tags as $tag)
                    <div class="mb-3">
                        <div class="form-check">
                            {{-- Se ci sono errori di validazione decido se mettere check o meno in basae a old() --}}
                            @if($errors->any())
                                <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} class="form-check-input" name="tags[]" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}">
                            @else
                            {{-- Altrimenti se non ci sono errori di validazione decido se mettere check o meno in basae a $post->tags->contains --}}
                                <input {{ $post->tags->contains($tag) ? 'checked' : '' }} class="form-check-input" name="tags[]" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}">
                            @endif
                            <label class="form-check-label" for="tag-{{$tag->id}}">
                                {{$tag->name}}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
@endsection