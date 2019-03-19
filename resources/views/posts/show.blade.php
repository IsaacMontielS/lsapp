@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go back</a>

    <h1>{{ ucwords($post->title ) }}</h1>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="max-width:400px">
            </div>
            <div class="col-lg-12 col-md-12 bg-white text-dark rounded p-2">
                {!! ucfirst($post->body)  !!}
            </div>
        </div>
    </div>
    <hr>
    <small class="float-right"> Publicado {{ $post->created_at}} por  {{$post->user->name }}</small>
    <p class="mb-2">&nbsp;</p>
    @if (!Auth::guest())
    @if (Auth::user()->id == $post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-default"> Editar</a>

        {!! Form::open(['action'=> ['PostsController@destroy',$post->id], 'method' =>'POST' ,'class' => 'float-right'])!!}
            {!! Form::hidden('_method','DELETE')!!}
            {!!Form::submit('Delete',['class' =>'btn btn-danger'])!!}
        {!!Form::close()!!}
    @endif
    @endif
    
@endsection