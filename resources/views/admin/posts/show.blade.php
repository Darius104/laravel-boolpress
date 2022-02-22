@extends('layouts.dashboard')

@section('content')
    <section>
        <h1>{{ $post->title }}</h1>

        <div>
            <strong> Slug: {{ $post->slug }} </strong>
        </div>

        <p>{{ $post->content }}</p>
    </section>
@endsection