{{-- SEZIONE MAINPOST  MODIFICA CREATE --}}
@extends('layouts.posts')

{{-- SEZIONE POST  MODIFICA CREATE STRUCTURE  --}}
@section('content')
    
    {{-- CONTAINER PER FORM  --}}
    <div class="container">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM MODIFICA POST  --}}
        <form action="{{ route('post.update', $new->id) }}"  method="post" enctype="multipart/form-data">
            
            {{-- TOKEN  --}}
            @csrf

            {{-- METHODO POST  --}}
            @method('PUT')

            {{-- BOX INPUT  --}}
            <div class="box-input">

                <div class="form-group">
                    <label for="exampleInputNome1">Name Post</label>
                    <input value="{{ $new->name }}" name="name" type="text" class="form-control" id="exampleInputNome1">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Contenuto</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $new->description }}</textarea>
                </div>

                {{-- CONTROLLO COVER  --}}
                @if($new->cover)
                    <img class="img-size" src="{{ asset('storage/'.$new->cover) }}" alt="{{ $new->title }}">
                @else
                    <p>Cover non inserita</p>
                @endif

                <div class="mb-3">
                    <label for="img" class="form-label">Scegli un file o img</label>
                    <input id="img" name="cover" class="form-control" type="file" id="formFile">
                </div>

                @foreach ($tags as $i)
                    <div class="form-group form-check">
                        <input name="tags[]" value="{{ $i->id }}" {{ $new->tags->contains($i->id) ? 'checked' : '' }} type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleChek1">{{ $i->name }}</label>
                    </div>
                @endforeach

            </div>
            {{--END BOX INPUT  --}}
            
            <button type="submit" class="btn btn-primary">Aggiungi</button>

        </form>
        {{--END FORM MODIFICA POST  --}}

    </div>
    {{--END CONTAINER PER FORM  --}}

@endsection    