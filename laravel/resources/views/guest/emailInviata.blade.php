{{-- STUTTURA EMAIL  --}}
<div class="container">

    <h2>Email</h2>

    <div class="box-email">

        <p> 
            <strong>Email ricevuta da:</strong>
            <span>{{ $email->email }}</span>
        </p>

        <p> 
            <strong>Oggetto:</strong>
            <span>{{ $email->oggetto }}</span>
        </p>

        <p> 
            <strong>Contenuto:</strong>
            <span>{{ $email->contenuto }}</span>
        </p>

    </div>

</div>