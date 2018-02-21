@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" method="post" action="{{route('todo.save' , ['id' => $todo->id])}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="todo" name="todo" value = "{{$todo->todo}}" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection