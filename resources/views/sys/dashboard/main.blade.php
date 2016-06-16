@extends('sys.template.app')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="page-header col-sm-12">
                <ul class="nav nav-pills pull-right">
                    <li role="presentation"><a href="#">Today</a></li>
                    <li role="presentation" class="active"><a href="#">Yesterday</a></li>
                    <li role="presentation"><a href="#">Last Week</a></li>
                </ul>

                <h4>Dashboard</h4>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- End container -->
@endsection