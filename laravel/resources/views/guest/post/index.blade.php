{{-- SEZIONE MAIN GUEST INDEX  --}}
@extends('layouts.postslogout')

{{-- CONTENUTO SEZIONE MAIN GUEST INDE X --}}
@section('content')

    {{-- BOX GENERALE  --}}
    <div class="box-posts">
        <h2>Elenco Post dei nostri Utenti</h2>

        {{-- BOX POSTS  --}}
        <div class="post">

            {{-- CICLO PER POSTS  --}}
            @foreach ($posts as $item)

                {{-- BOX POST  --}}
                <div class="card-body">
                    <h5 class="card-title"><strong>Title: </strong>{{ $item->name }}</h5>
                    <p class="card-text"><strong>Description: </strong>{{ $item->description }}</p>
                    <h6 class="card-title"><strong> Name Author:</strong> {{ $item->user->name }}</h6>
                    <a href="{{ route('show.guest.post', $item->slug) }}" class="btn btn-primary">Info</a>
                </div>
                {{--END BOX POST  --}}
                
            @endforeach
            {{--END CICLO PER POSTS  --}}

        </div>
        {{--END BOX POSTS  --}}

    </div>
    {{--END BOX GENERALE  --}}

@endsection