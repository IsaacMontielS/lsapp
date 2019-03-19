@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if (count($posts) >0)
        @foreach ($posts as $post)
            <div class="alert alert-light p-3 mb-1">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="max-width:400px">
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <h3> <a href="/posts/{{$post->id}}"> {{ ucwords( $post->title ) }} </a> </h3>
                        <small class="float-right"> Publicado {{ $post->created_at}} por  {{$post->user->name }}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>Posts no found</p>
    @endif
@endsection