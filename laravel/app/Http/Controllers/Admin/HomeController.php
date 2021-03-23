<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tag;
use App\User;

class HomeController extends Controller
{
    // CONTROLLER HOME INDEX POST 
    public function index()
    {
        $posts = Post::all();

        $data = [
            'posts' => $posts
        ];

        return view('admin.post.index',$data);
    }

    // CONTROLLER HOME INDEX TAG 
    public function show()
    {
        $tags = Tag::all();

        $data = [
            'tags' => $tags
        ];

        return view('admin.page.tags',$data);
    }

    // CONTROLLER HOME INDEX USER 
    public function user()
    {
        $users = User::all();

        $data = [
            'users' => $users
        ];

        return view('admin.page.users',$data);
    }

    // CONTROLLER METODO PER INFO UTENTE 
    public function profile(){
        return view ('admin.user.profile');
    }

    // CONTROLLER METODO PER CREARE TOKEN PER UTENTE 
    public function generaToken(){

        $api_token = Str::random(70);

        $user = Auth::user();
        $user->api_token = $api_token;
        $user->save();

        return redirect()->route('profile');
        
    }

}
