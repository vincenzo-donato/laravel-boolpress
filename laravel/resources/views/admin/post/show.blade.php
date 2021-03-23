{{-- SEZIONE MAIN SHOW  --}}
@extends('layouts.posts')

{{-- CONTENUTO SEZIONE MAIN SHOW  --}}
@section('content')

        <h2>Post: {{ $post->name }}</h2>

        <div class="card-body">
            <h5 class="card-title"><strong> Title:</strong> {{ $post->name }}</h5>
            <h6 class="card-title"><strong>ID referece: </strong> {{ $post->id }}</h6>
            <h6 class="card-title"><strong> Name Author:</strong> {{ $post->user->name }}</h6>
            <p class="card-text"><strong>Slug:</strong>  {{ $post->slug }}</p>
            <p class="card-text"><strong>Description:</strong>  {{ $post->description }}</p>
            <p class="card-text"><strong>Email Author:</strong>  {{ $post->user->email }}</p>
            <img class="img-size" src="{{ asset('storage/'.$post->cover) }}" alt="{{ $post->nome }}">
        </div>

@endsection