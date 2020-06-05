@extends('layouts.blog-home')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1> {{ $post->title}}</h1>
                <p class="lead">by {{$post->user->name }} </p>
                <hr>
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans() }}</p>
                <hr>
                <img width="450" class="img-responsive img-rounded" src="{{$post->photo ? $post->photo->file : $post->photoPlaceholder() }}" alt="">
                <hr>
                <p> {!! $post->body !!}</p>
                <hr>

            {{-- ........................Manually Implemented Comment System....................... --}}

                        {{-- @if (Auth::check())
                            <!-- Comments Form -->
                            <div class="well">
                                <h4>Leave a Comment:</h4>
                                {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store']) !!}
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <div class="form-group">
                                    {!! Form::label('body', 'Body:') !!}
                                    {!! Form::textarea('body', null, ['class'=> 'form-control', 'rows'=>3]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Submit Comment', ['class'=> 'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        @endif
                        <hr>

                        @if (count($comments)> 0)
                            @foreach ($comments as $comment)
                                <div class="media">
                                    <a class="pull-left" href="#">
                                    <img height="64" class="media-object img-rounded" src=" {{ Auth::user()->gravatar }} " alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$comment->author}}
                                            <small>{{ $comment->created_at->diffForHumans() }}</small>
                                        </h4>
                                        <p> {{ $comment->body }} </p>


                                        @if (count($comment->replies)> 0)
                                            @foreach ($comment->replies as $reply)
                                                @if ($reply->is_active == 1)
                                                    <!-- Nested Comment -->
                                                        <div id="nested-comment" class="media">
                                                            <a class="pull-left" href="#">
                                                            <img height="34" class="media-object img-rounded" src=" {{ $reply->photo }}" alt="">
                                                            </a>
                                                            <div class="media-body">
                                                                <h4 class="media-heading"> {{$reply->author}}
                                                                <small> {{$reply->created_at->diffForHumans()}} </small>
                                                                </h4>
                                                                <p> {{$reply->body}} </p>
                                                            </div>

                                                            <div class="comment-reply-container"> 
                                                                <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                                                                <div class="comment-reply col-sm-6">
                                                                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                                                                        
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                                            {!! Form::label('body', 'Body:') !!}
                                                                            {!! Form::textarea('body', null, ['class'=> 'form-control ', 'rows'=>1]) !!}
                                                                        </div>
                                                                        <div class="form-group">
                                                                            {!! Form::submit('submit', ['class'=> 'btn btn-primary']) !!}
                                                                        </div>
                                                                        {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        <!-- End Nested Comment -->
                                                        </div> 
                                                    @else
                                                        <h1 class="text-center"> No Replies </h1>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
            @stop

            @section('scripts')
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                    <script>

                        $(".comment-reply-container .toggle-reply").click(function(){
                            $(this).next().slideToggle("slow");
                        });
                    </script> --}}


         {{-- Alter native comment system from disqus --}}

            <div id="disqus_thread"></div>
            <script>
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://codehacking-isxeizytxl.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            <script id="dsq-count-scr" src="//codehacking-isxeizytxl.disqus.com/count.js" async></script>
                                
        </div>
        @include('includes.front_sidebar')
    </div>
    
@stop