@extends('site.template.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li class="active">Home</li>
    </ol>

    <div class="page-header">
        <h1>Latest <small>Posts</small></h1>
    </div>

    <div class="row section_posts">

        @include('site.inc.post')

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