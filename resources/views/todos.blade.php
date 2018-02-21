@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form class="form-horizontal" method="post" action="/create/todo">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="todo" name="todo" placeholder="Create an item">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<hr>
<table class="table table-striped">
    <tr>
        <th>To Do List</th>
    </tr>

    @foreach($todos as $todo)
        <tr>
            <td>{{$todo->todo}} <a href="{{route('todo.delete' , ['id' => $todo->id])}}" class="btn btn-xs btn-danger"> X </a>
                <a href="{{route('todo.update' , ['id' => $todo->id])}}" class="btn btn-xs btn-info"> EDIT </a>

                @if(!$todo->completed)
                    <a href="{{route('todos.completed', ['id' => $todo->id ])}}" class="btn btn-xs btn-success">Mark as completed</a>
                @else
                    Completed
                @endif
            </td>
        </tr>
    @endforeach

</table>

@endsection