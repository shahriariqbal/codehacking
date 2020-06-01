@extends('layouts.blog-home')

@section('content')

{{-- <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}



<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        {{-- <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
        </h1> --}}




        <!-- First Blog Post -->

        @if ($posts)

            @foreach ($posts as $post)

                <h2>
                    <a href="#"> {{ $post->title }} </a>
                </h2>
                <p class="lead">
                    by  {{ $post->user->name }}
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>
                <hr>
                <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">
                <hr>
                <p> {!! str_limit( $post->body, 200 ) !!} </p>
                <a class="btn btn-primary" href="/post/{{$post->id}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
            @endforeach
            
        @endif







        <!-- Second Blog Post -->
        {{-- <h2>
            <a href="#">Blog Post Title</a>
        </h2>
        <p class="lead">
            by <a href="index.php">Start Bootstrap</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
        <hr>
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr> --}}

        <!-- Third Blog Post -->
        {{-- <h2>
            <a href="#">Blog Post Title</a>
        </h2>
        <p class="lead">
            by <a href="index.php">Start Bootstrap</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
        <hr>
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr> --}}

        <!-- Pager -->
        {{-- <ul class="pager">
            <li class="previous">
                <a href="#">&larr; Older</a>
            </li>
            <li class="next">
                <a href="#">Newer &rarr;</a>
            </li>
        </ul> --}}


        <!-- Pagination -->

    </div>

    <!-- Blog Sidebar -->
    @include('includes.front_sidebar')










</div>

@endsection
