@extends('site.template.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/category/{{ $post->category->id }}">{{ ucfirst($post->category->name) }}</a></li>
        <li class="active">Post</li>
    </ol>

    <div class="page-header">
        <h4><small>{{ $post->datePosted }}</small></h4>
        <h1>{{ $post->title }}</h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            <h3 class="post-author text-right"><small>by</small> <a href="/author/{{ $post->author->id }}">{{ $post->author->name }}</a></h3>
        </div>
        @if($post->images->count() > 0)
            <div class="col-md-6">
                <div id="post-images-carousel" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        @forelse($post->images as $imageKey => $image)
                            <div class="item {{ $imageKey == 0 ? 'active' : '' }}">
                                <img src="{{ $image->image}}" alt="{{ $image->legend }}">
                            </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#post-images-carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#post-images-carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        @endIf
        <div class="{{ $post->images->count() > 0 ? 'col-md-6' : 'col-md-12' }}">
            <p>{{ $post->content }}</p>
            <hr>

            @if($post->tags->count() > 0)
                @forelse($post->tags as $tag)
                    <a href="/tag/{{ $tag->id }}" class="label label-info">{{ ucfirst($tag->name) }}</a>
                @endforeach
            @endif
        </div>

    </div>

    <div class="page-header">
        <h2>Comments <small class="pull-right">{{ $post->comments->count() }} {{ $post->comments->count() == 1 ? 'comment' : 'comments' }}</small></h2>
    </div>

    <div class="col-md-6 section-post-comment-form no-padding">
        <form action="" method="post" name="form-post-comment" role="form">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" placeholder="Name" required>
            </div>
            <div class="form-group col-md-6">
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="E-mail" required aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon2">@example.com</span>
                </div>
            </div>
            <div class="form-group col-md-12">
                <textarea class="form-control" rows="4" placeholder="What are you thinking right now?" required></textarea>
            </div>
            <div class="form-group col-md-12 button-control text-right">
                <button type="reset" class="btn btn-warning"><i class="fa fa-eraser"></i> Erase</button>
                &nbsp;
                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Publish</button>
            </div>
        </form>
    </div><!-- Widget Area -->

    @if($post->comments->count() > 0)
        <div class="row section-post-comments">
            @forelse($post->comments as $comment)
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>{{ $comment->name }}</strong> <span class="text-muted">commented {{ $comment->rightNow }}</span>
                        </div>
                        <div class="panel-body">
                            {{ $comment->comment }}
                        </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                </div><!-- /col-sm-5 -->
            @endforeach
        </div>
    @endif

</div>
@endsection

@section('documentReadyContinue')
    $('.carousel').carousel({interval: false});
@endsection