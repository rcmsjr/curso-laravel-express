@extends('site.template.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Authors</li>
    </ol>

    <div class="page-header">
        <h1>Authors</h1>
    </div>

    <div class="row section-authors">

        @forelse($authors as $author)
            <div class="col-sm-6 col-md-3">
                <div class="card">
                    <div class="header-bg" id="header-blur"></div>
                    <div class="avatar">
                        <img src="{{ $author->avatar }}" alt="{{ $author->name }}" />
                    </div>
                    <div class="content">
                        <p>{{ $author->name }} <br>
                            {{ $author->email }}</p>
                        <p><a href="/author/{{ $author->id }}" class="btn btn-default" role="button">Posts</a></p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-sm-6 col-md-3">
                <p>No authors yet!</p>
            </div>
        @endforelse
    </div>

</div>
@endsection

@section('documentReadyContinue')
    $('.section_posts').masonry();
@endsection