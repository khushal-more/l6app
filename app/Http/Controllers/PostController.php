<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        return $request->path();
//        return $request->url();
//        return $request->fullUrl();
//        return $request->fullUrl();
//        return $request->is('posts') ? 'accepted':'not';
//        return $request->method();
//        return $request->isMethod('GET') ? 'accepted' : 'not';
        $post = new Post();
        $data = $post->data();
        return view('posts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        $request->flash();
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        /*$request->validate([
           'title'=>'required',
           'content'=>'required',
           'photo'=>'required',
           'check'=>'required',
        ]);*/
        return back()->withInput();
//        return $request->all();
//        return 'hello world';
//        return back()->withInput();
//        return $request->file('photo')->store('images');
//        return $request->file('photo')->store('images', 'public');
//        return $request->file('photo')->storeAs('images', 'logo.jpg', 'public');
        /*if($request->hasFile('photo')) {
            $folderName = sprintf('profile_%s', 1);
            $fileName = sprintf('logo_%s', random_int(1, 1000));
            return $request->file('photo')->storeAs($folderName, $fileName, 'public');
        }*/
//        return $request->all();
//        return $request->check[1];
        //return $request->input();
//        return $request->only(['title', 'check']);
//        return $request->except(['title', 'check']);
        $data =  $request->input();
        return view('posts.show', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
