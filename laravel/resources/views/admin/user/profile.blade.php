{{-- SEZIONE MAIN TAGS--}}
@extends('layouts.posts')

{{-- CONTENT SEZIONE MAIN TAGS --}}
@section('content')

        {{-- BOX GENERALE  --}}
        <div class="box-posts">
            <h2>Dati Utente</h2>

            <div class="card" style="width: 18rem;">

                <div class="card-body">
                    
                    {{-- STAMPO NOME UTENTE  --}}
                    <p class="card-title">{{ Auth::user()->name }}</p>

                    {{-- STAMPO EMAIL UTENTE  --}}
                    <p class="card-title">{{ Auth::user()->email }}</p>

                    {{-- CONTROLLO SUL TOKEN  --}}
                    @if(Auth::user()->api_token)
                        <p class="card-title">{{ Auth::user()->api_token }}</p>
                    @else
                        <form action="{{ route('genera-token') }}" method="post">
                            @csrf
                            @method('POST')
                            <button class="btn btn-primary">Genera Api</button>
                        </form>
                    @endif

                </div>

            </div>

        </div>
        {{--END BOX GENERALE  --}}

@endsection