{{-- SEZIONE MAIN INDEX  --}}
@extends('layouts.posts')

{{-- CONTENT SEZIONE MAIN INDEX  --}}
@section('content')

        {{-- BOX GENERALE  --}}
        <div class="box-posts">

            <h2>Elenco Post dei nostri Utenti</h2>
            
            <h4><a href="{{ route('post.create') }}" class="btn-margin btn btn-success">Add Post</a></h4>
    
            {{-- STATUS MODIFICHE-AGGIUNTE-CANCELLAZIONI POST  --}}
            @if (session('status'))
                <div class="alert alert-primary">
                    {{ session('status') }}
                </div>
            @endif

            {{-- BOX PER POSTS  --}}
            <div class="post">

                {{-- CICLO PER POST  --}}
                @foreach ($posts as $item)

                    {{-- BOX POST  --}}
                    <div class="card-body">

                        <h5 class="card-title"><strong> Name Author:</strong> {{ $item->user->name }}</h5>
                        <h5 class="card-title"> <strong>Title Post: </strong> {{ $item->name }}</h5>
                        <p class="card-text"> <strong>Description: </strong> {{ $item->description }}</p>
                        <p class="card-text"> <strong>Id Reference: </strong> {{ $item->id }}</p>
                        <a href="{{ route('post.show', $item->id) }}" class="btn-margin btn btn-primary">Info</a>
                        <a href="{{ route('post.edit', $item->id) }}" class="btn-margin btn btn-warning">Modifica</a>
                            
                        {{-- FORM DELETE ITEM  --}}
                        <form action="{{ route('post.destroy', $item->id)}}"  method="post">
                            
                            {{-- TOKEN  --}}
                            @csrf
                            
                            {{-- METHODO DELETE  --}}
                            @method('DELETE')
                            
                            <button type="submit" class="btn-margin btn btn-danger">Cancella</button>
                            
                        </form>
                        {{--END FORM DELETE ITEM  --}}
                    
                    </div>
                    {{--END BOX POST  --}}
                
                @endforeach
                {{--END CICLO PER POST  --}}
            
            </div>
            {{--END BOX PER POSTS  --}}
        
    </div>
        {{--END BOX GENERALE  --}}

@endsection