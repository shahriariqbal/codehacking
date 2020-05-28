@extends('layouts.admin')


@section('content')



{{-- Flash message (session) --}}

{{-- for deleted user --}}
@if (Session::has('deleted_user'))

  <p class="bg-danger">{{ session('deleted_user')}} </p>
    
@endif

{{-- for updated user --}}
@if (Session::has('updated_user'))

  <p class=" bg-primary text-white">{{ session('updated_user')}} </p>
    
@endif

{{-- for created user --}}
@if (Session::has('created_user'))

  <p class=" bg-success text-white">{{ session('created_user')}} </p>
  
    
@endif




<h1> Users </h1>


<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>

        @if($users)
           @foreach ($users as $user)

           <tr>
           <td> {{$user->id }}</td>
           <td>  <img height="50" width="50" src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/50x50'}}" alt="" class="img-responsive img-rounded"> </td>
           <td> <a href="{{ route('admin.users.edit', $user->id ) }}">    {{$user->name }}</a> </td>
           <td> {{$user->email }}</td>
           <td> {{$user->role->name }}</td>
           <td> {{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
           <td>{{$user->created_at->diffForHumans()}}</td>
           <td> {{$user->updated_at->diffForHumans()}}</td>
          </tr>
               
           @endforeach
            
        @endif

    </tbody>
  </table>

  <div class="row">
    <div class="col-sm-6 col-sm-offset-5"></div>
      {{$users->render()}}
  </div>
    
@stop