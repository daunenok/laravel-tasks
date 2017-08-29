@extends("layouts.app")

@section("content")
<div class="alert alert-info">
    <h1>Task List</h1>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">New Task</div>
    </div>
    <div class="panel-body">
        @include("layouts.errors")
        <form action="/laravel/tasks/public/task" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="task">
                    Task
                </label>
                <input type="text" class="form-control" id="task" name="task">
            </div>
            <button type="submit" class="btn btn-default">
                <span>&plus;</span> Add Task
            </button>
        </form>
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">Current Tasks</div>
    </div>
    <div class="panel-body">
    <table class="table">
        <thead>
            <tr>
                <th>Task</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>
                        <form action="/laravel/tasks/public/task/{{$task->id}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection