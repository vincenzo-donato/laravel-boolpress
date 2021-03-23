{{-- SEZIONE MAIN GUEST RICHIESTA INVIO EMAIL  --}}
@extends('layouts.postslogout')

{{-- CONTENUTO SEZIONE MAIN GUEST RICHIESTA INVIO EMAIL --}}
@section('content')

    <h2>Contattaci</h2>

    {{-- STATUS EMAIL INVIATA   --}}
    @if (session('status'))
        <div class="alert alert-primary">
            {{ session('status') }}
        </div>
    @endif

    {{-- SEZIONE ERRORI O CAMPI VUOTI  --}}
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    {{-- BOX GENERALE  --}}
    <div class="box-posts">

        {{-- FORM NEW POST  --}}
        <form action="{{ route('request.guest.post') }}"  method="post">
            
            {{-- TOKEN  --}}
            @csrf

            {{-- METHODO POST  --}}
            @method('POST')

            {{-- BOX INPUT  --}}
            <div class="box-input">

                <div class="form-group">
                    <label for="exampleInputNome1">Email</label>
                    <input name="email" type="text" class="form-control" id="exampleInputNome1">
                </div>

                <div class="form-group">
                    <label for="exampleInputNome1">Oggetto Email</label>
                    <input name="oggetto" type="text" class="form-control" id="exampleInputNome1">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Inserisci il contenuto</label>
                    <textarea name="contenuto" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

            </div>
            {{--END BOX INPUT  --}}
            
            <button type="submit" class="btn btn-primary">Invia</button>

        </form>
        {{--END FORM NEW POST  --}}


    </div>
    {{--END BOX GENERALE  --}}

@endsection