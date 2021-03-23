{{-- SEZIONE MAIN TAGS--}}
@extends('layouts.posts')

{{-- CONTENT SEZIONE MAIN TAGS --}}
@section('content')

        {{-- BOX GENERALE  --}}
        <div class="box-posts">

            <h2>Elenco User dei nostri Utenti</h2>
            
            {{-- BOX PER TAGSS  --}}
            <div class="post">

                {{-- CICLO PER TAGS  --}}
                @foreach ($tags as $item)

                    {{-- BOX TAGS  --}}
                    <div class="card-body">

                        <h5 class="card-title"><strong>Tag Name: </strong> {{ $item->name }}</h5>
                        <p class="card-text"><strong>Tag Slug: </strong> {{ $item->slug }}</p>
                    
                    </div>
                    {{--END BOX TAGS  --}}
                
                @endforeach
                {{--END CICLO PER TAGS  --}}
            
            </div>
            {{--END BOX PER TAGSS  --}}
        
    </div>
        {{--END BOX GENERALE  --}}

@endsection