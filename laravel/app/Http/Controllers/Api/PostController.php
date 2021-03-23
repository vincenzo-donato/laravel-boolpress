<?php

namespace App\Http\Controllers\Api;
use App\Post;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = new Post::all();

        return response()->json([
            'success' => true,
            'response' => $posts
        ]);
    }
}
