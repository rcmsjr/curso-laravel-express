@extends('site.template.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Category</li>
    </ol>

    <div class="page-header">
        <h1>Posts <small> of {{ ucfirst($category->name) }}</small></h1>
    </div>

    <div class="row section_posts">
        @forelse($posts as $post)
            <div class="article_post_synopsis col-sm-6 col-md-3">
                <div class="thumbnail">
                    @if($post->images->count() > 0)
                        <img class="post-thumbnail" alt="100%x200" src="{{ $post->images->first()->image}}">
                    @endIf
                    <div class="caption">
                        <h5>{{ ucfirst($post->category->name) }}</h5>
                        <small>{{ $post->datePosted }}</small>
                        <h3>{{ $post->title }}</h3>
                        <h6 class="text-right">by {{ ucfirst($post->author->name) }}</h6>
                        <p>{{ $post->description }}</p>
                        <p><a href="/post/{{ $post->id }}" class="btn btn-default" role="button">Learn more</a></p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-sm-6 col-md-3">
                <p>No posts yet!</p>
            </div>
        @endforelse

    </div>

    <div class="row text-center">
        {!! $posts->render() !!}
    </div>

</div>
@endsection

@section('documentReadyContinue')
    $('.section_posts').masonry();
@endsection