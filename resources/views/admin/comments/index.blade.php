@extends('layouts.admin')

@section('content')

     @if (count($comments) > 0)
         
    <table style="text-align:center" class="table table-bordered table-hover">
        <thead >
            <tr>
                <th style="text-align:center">Id</th>
                <th style="text-align:center">Author</th>
                <th style="text-align:center">Email</th>
                <th style="text-align:center">Body</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{$comment->id }}</td>
                    <td>{{$comment->author }}</td>
                    <td>{{$comment->email }}</td>
                    <td>{{$comment->body }}</td>
                    <td> <a href="{{ route('home.post', $comment->post->id ) }}"> View Post </a></td>


                    {{-- <td> 
                        {!! Form::open(['method'=>'DELETE', 'action'=>[ 'AdminMediasController@destroy', $photo->id ]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                    </td> --}}

                </tr>
            @endforeach
        </tbody>
    </table>

    @else
        <h1 class="text-center"> No Comments</h1>
    @endif

@stop