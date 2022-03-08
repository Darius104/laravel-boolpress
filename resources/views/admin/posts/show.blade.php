@extends('layouts.dashboard')

@section('content')
    <section>
        <h1>{{ $post->title }}</h1>
        
        @if ($post->cover)
            <div>
                <img width="1000 px" src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}">
            </div>
        @endif

        <div>
            <strong> Slug: {{ $post->slug }} </strong>
        </div>

        <div>
            <strong> Categoria: {{ $post->category ? $post->category->name : 'Nessuna' }} </strong>
        </div>

        <div>
            <strong> Tags: </strong>
            @forelse ($post->tags as $tag)
                {{ $tag->name }}{{ $loop->last ? ' ' : ', ' }}
            @empty
                Nessuno
            @endforelse
        </div>

        <p>{{ $post->content }}</p>

        <div>
            <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Modifica Post</a>
        </div>

        <div>
            <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </section>
@endsection