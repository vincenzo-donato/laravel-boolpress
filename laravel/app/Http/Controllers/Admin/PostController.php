<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // RECUPERO TUTTI I POST 
        $posts = Post::all();

        // ARRAY D'APPOGGIO 
        $data = [
            'posts' => $posts
        ];

        // RITORNO SU ROTTA + DATA PER DATI
        return view('admin.post.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // RECUPERO TUTTI I TAG 
        $tags = Tag::all();

        // ARRAY D'APPOGGIO
        $data = [
            'tags' => $tags
        ];

        // RITORNO SU ROTTA + DATI 
        return view('admin.post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // RECUPERO TUTTI I DATI DAL FORM 
        $data = $request->all();

        // RECUPERO GLI ID DA TABELLA 
        $idUser = Auth::id();

        // CONTROLLO SU FORM 
        $request->validate([
            'name' => 'unique:posts|required|max:80',
            'description' => 'required',
        ]);

        // RECUPERO DATO POST FORM 
        $new = new Post();

        // DO UN VALORE AL USER_ID 
        $new->user_id = $idUser;

        // SLUG INSERITO AL NOME 
        $new->slug = Str::slug($data['name']);

        // IMPOSTAZIONI IMG 
        $cover = Storage::put('Post_cover',$data['cover']);
        $data['cover'] = $cover;
        $new->cover = $data['cover'];
        
        // FILLABLE PER EVITARE DI RISCRIVERE TUTTI I VALORI 
        $new->fill($data);
        
        // SALVO IL NUOVO POST 
        $new->save();

        // SALVO ENTRAMBI GLI ID (TAG E POST)
        if(array_key_exists('tags',$data)){
            $new->tags()->sync($data['tags']);
        }

        // REINDIRIZZO LA ROTTA E DOPO UN STATUS 
        return redirect()->route('post.index')->with('status','Nuovo Post Aggiunto Correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // PRENDO TUTTI I POST 
        $data = [
            'post' => $post
        ];
     
        // RITORNO PAG + DATI POST 
        return view('admin.post.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // RECUPERO TUTTI I TAG 
        $tags = Tag::all();

        // INSERISCO I POST E I TAG IN UNA ARRAY D'APPOGGIO 
        $data = [
            'new' => $post,
            'tags' => $tags
        ];
        
        // RITORNO PAG + DATI 
        return view('admin.post.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        // RECUPERO TUTTI I DATI FORM MODIFICATI 
        $data = $request->all();

        // CONTROLLO VALIDITA'
        $request->validate([
            'name' => 'required|max:80',
            'description' => 'required',
        ]);

        if(array_key_exists('cover',$data)){
            $cover = Storage::put('Post_cover',$data['cover']);
            $data['cover'] = $cover;
        }

        // SOVRASCRIVO I VECCHI DATI CON QUELLI NUOVI 
        $post->update($data);

        // CONTROLLO PER ID TAG POST MODIFICATO 
        if(array_key_exists('tags',$data)){
            $post->tags()->sync($data['tags']);
        }

        // RETURN QUESTA VOLTA VERRA' REINDIRIZZATA ALLA PAGINA DEI POST
        return redirect()->route('post.index')->with('status','Post Modificato Correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // SVUOTO I TAG 
        $post->tags()->sync([]);

        // RECUPERO L'ELEMENTO TRAMITE ID E LO CANCELLO CON IL COMANDO DELETE
        $post->delete();

        // REINDIRIZZO LA PAGE A POST ADMIN INDEX 
        return redirect()->route('post.index')->with('status','Post Cancellato Correttamente');
    }
}
