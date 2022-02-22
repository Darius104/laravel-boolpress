@extends('layouts.dashboard')

@section('content')
    <section>
        <h1>{{ $post->title }}</h1>

        <div>
            <strong> Slug: {{ $post->slug }} </strong>
        </div>

        <p>{{ $post->content }}</p>

        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Modifica Post</a>
    </section>
@endsection