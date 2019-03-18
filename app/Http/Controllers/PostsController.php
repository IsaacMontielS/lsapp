<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // var posts almacena todos los dato del model Posts almacenados en la BD 
        $posts =  Post::orderBy('created_at','desc')->paginate(10);
        // $posts =  Post::orderBy('title','asc')->take(1)->get();
        // $posts =  Post::orderBy('title','asc')->get();
        return view('posts.index')->with('posts',$posts);//Regresamos la vista pasando posts
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        array(
            'title' =>'required',
            'body' => 'required'
        ));
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
         return redirect('/posts')->with('success','Se a Publicado Su Post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post);
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
        $this->validate($request,
        array(
            'title' =>'required',
            'body' => 'required'
        ));
        $post =  Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
         return redirect('/posts')->with('success','Se actualizo  su Post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success','Se elimino la publicacion');
    }
}
