<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facade\FlareClient\View;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;
use App\Post;
use App\Tag;
use App\User;
use App\Email;

class PostController extends Controller
{
    // METODO PER INDEX POST 
    public function index(){
        // RECUPERO TUTTI I DATI POST 
        $posts = Post::all();

        // ARRAY D'APPOGGIO 
        $data = [
            'posts' => $posts
        ];

        // INDIRIZZO LA PAG + DATI 
        return view('guest.post.index',$data);
    }

    // METODO PER POST SHOW
    public function show($slug){

        // RECUPERO IL DATO SCELTO TRAMITE LO SLUG 
        $post = Post::where('slug',$slug)->first();

        // ARRAY D'APPOGGIO 
        $data = [
            'post' => $post
        ];

        // RITORNO PAG + DATI RICHIESTI 
        return view('guest.post.show',$data);
    }

    // METODO PER TAG SHOW
    public function tag(){
        // RECUPERO TUTTI I DATI POST 
        $users = Tag::all();

        // ARRAY D'APPOGGIO 
        $data = [
            'tags' => $users
        ];

        // INDIRIZZO LA PAG + DATI 
        return view('guest.page.tags',$data);
    }

    // METODO PER USER SHOW
    public function user(){
        // RECUPERO TUTTI I DATI POST 
        $users = User::all();

        // ARRAY D'APPOGGIO 
        $data = [
            'users' => $users
        ];

        // INDIRIZZO LA PAG + DATI 
        return view('guest.page.users',$data);
    }

    // METODO PRITORNO PAGINA SCRITTURA EMAIL 
    public function request(){

        // INDIRIZZO LA PAG 
        return view('guest.emailRequest');

    }

    // METODO PER RICHIESTA INVIO EMAIL
    public function requestSend(Request $request){

        // RECUPERO TUTTI I DATI POST 
        $data = $request->all();

        // CONTROLLO SU FORM PER CAMPI OBBLIGATORI
        $request->validate([
            'email' => 'required',
            'contenuto' => 'required'
        ]);

        // LI MEMORIZZO TRAMITE LE FILLABLE E SALVO
        $newEmail = new Email();
        $newEmail->fill($data);
        $newEmail->save();

        // GRAZIE ALLA CLASSE MAIL POSSO INVIARE AL DESTINATARIO IL CONTENUTO DELLA MIA EMAIL 
        Mail::to('info@project.com')->send(new SendNewMail($newEmail));

        // REINDIZZO LA PAGINA CON UNO STATUS DI CONFERMA DELL'INVIO DELL'EMAIL 
        return redirect()->route('request.guest.post')->with('status','Email inviata Correttamente');

    }
}
