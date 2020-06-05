@extends('layouts.admin')

@section('content')

    <h1> Media </h1>

    @if($photos)

        <form action="delete/media" method="post" class="form-inline">

            {{-- {{ csrf_field() }}
            {{ method_field('delete') }} --}}
            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>

            <table style="text-align:center" class="table table-bordered table-hover">
                <thead >
                    <tr>
                        <th style="text-align:center"> <input type="checkbox" id="options"> </th>
                        <th style="text-align:center">Id</th>
                        <th style="text-align:center">Path</th>
                        <th style="text-align:center">Image</th>
                        <th style="text-align:center">Created</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($photos as $photo)
                        <tr>
                            <td> <input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }}"> </td>
                            <td>{{$photo->id }}</td>
                            <td>{{$photo->file }}</td>
                            <td align="center"> <img width="60" src="{{$photo->file }}" alt="" class="img-responsive img-rounded" > </td>
                            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date' }}</td>
                            <td> 
                                {{-- <input type="hidden" name="photo" value=" {{$photo->id}} "> --}}
                                {!! Form::open(['method'=>'DELETE', 'action'=>[ 'AdminMediasController@destroy', $photo->id ]]) !!}
                                    {{-- <div class="form-group">
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                    </div> --}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>

    @endif

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5"></div>
          {{$photos->render()}}
    </div>

@stop

@section('scripts')
<script>
    $(document).ready(function(){
        $('#options').click(function(){
            if (this.checked) {
                $('.checkBoxes').each(function(){
                    this.checked =  true;
                });
            }else{
                $('.checkBoxes').each(function(){
                    this.checked =  false;
                });
            }
        });
    })

</script>
@stop