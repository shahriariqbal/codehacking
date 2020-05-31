@extends('layouts.admin')

@section('content')

<h1> Posts </h1>


<table class="table ">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Title</th>
        <th>Owner</th>
        <th>Category</th>
        
        <th>Body</th>
        <th>Post Link</th>
        <th>Comments</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>

        @if($posts)
           @foreach ($posts as $post)

           <tr>
           <td> {{$post->id}}</td>
           <td>  <img height="50" width="50" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/50x50'}}" alt="" class="img-responsive img-rounded"> </td>
           <td>  <a href="{{route('admin.posts.edit',$post->id)}}"> {{$post->title}}  </a>  </td>
           <td>  {{$post->user->name}}  </td>
           <td> {{$post->category ? $post->category->name : 'Uncategorized'}} </td>
           
           <td> {{str_limit(  $post->body, 30) }} </td>
           <td><a href="{{route('home.post', $post->id)}}"> View Post</a></td>
           <td><a href="{{route('admin.comments.show', $post->id)}}"> View Comments</a></td>
           <td> {{$post->created_at->diffForHumans()}}</td>
           <td> {{$post->updated_at->diffForHumans()}}</td>
          </tr>
               
           @endforeach
            
        @endif

    </tbody>
  </table>

  <div class="row">
    <div class="col-sm-6 col-sm-offset-5"></div>
      {{$posts->render()}}
  </div>

@stop