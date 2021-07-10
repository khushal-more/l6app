<?php
namespace App\Http\Controllers;
use App\Post;
class WelcomeController extends Controller{
    public function welcome(){
//        return "hello, welcome {$name}";
//        $data = ['name'=>'AKI', 'company'=>'Namo'];
        $post = new Post();
        $data = $post->data();
        return view('welcome', compact('data'));
    }
}
