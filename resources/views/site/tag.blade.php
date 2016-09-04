@extends('site.template.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Tag</li>
    </ol>

    <div class="page-header">
        <h1>Posts <small> of {{ ucfirst($tag->name) }}</small></h1>
    </div>

    <div class="row section_posts">

        @include('site.inc.post')

    </div>

    <div class="row text-center">
        {!! $posts->render() !!}
    </div>

</div>
@endsection

@section('scripts')
    @parent
    <script src="https://unpkg.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.section_posts').masonry();
        });
    </script>
@stop