{{-- SEZIONE MAIN USER--}}
@extends('layouts.posts')

{{-- CONTENT SEZIONE MAIN USER --}}
@section('content')

        {{-- BOX GENERALE  --}}
        <div class="box-posts">

            <h2>Elenco User dei nostri Utenti</h2>
            
            {{-- BOX PER USERS  --}}
            <div class="post">

                {{-- CICLO PER USER  --}}
                @foreach ($users as $item)

                    {{-- BOX USER  --}}
                    <div class="card-body">

                        <h5 class="card-title"><strong>User: </strong> {{ $item->name }}</h5>
                        <p class="card-text"><strong>Email: </strong> {{ $item->email }}</p>
                    
                    </div>
                    {{--END BOX USER  --}}
                
                @endforeach
                {{--END CICLO PER USER  --}}
            
            </div>
            {{--END BOX PER USERS  --}}
        
    </div>
        {{--END BOX GENERALE  --}}

@endsection