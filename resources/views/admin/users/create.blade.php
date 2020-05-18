@extends('layouts.admin')

@section('content')

<h1> Create Users </h1>

 {!! Form::open(['method'=>'POST', 'action'=> 'AdminUsersController@store']) !!}


 <div class="form-group">
     {!! Form::label('name', 'Name:') !!}
     {!! Form::text('name', null, ['class'=> 'form-control'])  !!}
 </div>

 <div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class'=> 'form-control'])  !!}
</div>

<div class="form-group">
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::text('role_id', null, ['class'=> 'form-control'])  !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class'=> 'form-control'])  !!}
</div>


 <div class="form-group">
     {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}

 </div>

{!! Form::close() !!}
    
@stop