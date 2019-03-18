@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if (count($posts) >0)
        @foreach ($posts as $post)
            <div class="alert alert-light p-3 mb-1">
                <h3> <a href="/posts/{{$post->id}}"> {{ ucwords( $post->title ) }} </a> </h3>
            <small class="float-right"> Written on {{ $post->created_at}}</small>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>Posts no found</p>
    @endif
@endsection