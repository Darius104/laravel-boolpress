@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="container">
            <h1>Lista dei posts</h1>

            <div class="row row-cols-3">
                @foreach ($posts as $post)
                    <div class="card mt-3">
                        <div class="card-body">
                            @if ($post->cover)
                                <div>
                                    <img width="100%" src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}">
                                </div>
                            @endif
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::substr($post->content, 0, 80) }}</p>
                            <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection