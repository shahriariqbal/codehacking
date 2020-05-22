@extends('layouts.admin')

@section('content')

    <h1> Media </h1>

    @if($photos)
    
        <table style="text-align:center" class="table table-bordered table-hover">
            <thead >
                <tr>
                    <th style="text-align:center">Id</th>
                    <th style="text-align:center">Path</th>
                    <th style="text-align:center">Image</th>
                    <th style="text-align:center">Created</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($photos as $photo)
                    <tr>
                        <td>{{$photo->id }}</td>
                        <td>{{$photo->file }}</td>
                        <td align="center"> <img width="60" src="{{$photo->file }}" alt="" class="img-responsive img-rounded" > </td>
                        <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif

@stop