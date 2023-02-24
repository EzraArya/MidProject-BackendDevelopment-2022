@extends('template')

@section('title', 'home')

@section('body')

    <h1>Hello, {{ Auth::user()->name }}</h1>

    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Task Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Task Name" name="task_name">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Deadline</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="deadline">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <br>
    <br>
    @if ($tasks)
    @endif
    @foreach ($tasks as $task)
        <h1>Task</h1>
        <ul class="list-group list-group-flush">
            @if ($task->is_done == 0)
                <li class="list-group-item">{{ $task->task_name }} - {{ $task->deadline }} <button type="button"
                        class="btn btn-outline-primary">Done</button> <button type="button"
                        class="btn btn-outline-danger">Delete</button></li>
            @endif
            @empty
                No Task Found
            </ul>

            <br>
            <h1>Completed Task</h1>
            <ul class="list-group list-group-flush">
                @if ($task->is_done == 1)
                    <li class="list-group-item" style="text-decoration: line-through;">{{ $task->task_name }} -
                        {{ $task->deadline }}<button type="button" class="btn btn-outline-primary">Restore</button></li>
                @endif
                @empty
                    No Task Found
                </ul>
            @endforeach

        @endsection
