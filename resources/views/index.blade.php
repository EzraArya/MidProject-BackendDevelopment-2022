<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <nav>
        <h1 id="nav-user">Hello, {{ Auth::user()->name }}</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('post')
            <button id="logout-button">LOG OUT</button>
        </form>
    </nav>
    <br><br>
    <main>
        <div class="card-1">
            <h1 id="enter-task">Enter Task</h1>
            <form action="{{ route('new_task') }}" id="form-task" method="POST">
                @csrf
                <input type="text" name="task_name" id="task_name" placeholder="Task Name">
                <br><br>
                <input type="date" name="deadline" id="deadline">
                <br><br><br>
                <div class="button">
                    <button type="submit" id="submit-task">SUBMIT</button>
                </div>
            </form>
        </div>
        <div class="to-do">
            <div class="card-2">
                <h1 id="to-do-title">Task To Do!</h1>
                <ul id="task-list">
                    @foreach ($tasks as $task)
                        @if ($task->is_done == 0)
                            @if ($task->user_id == auth()->id())
                                <li>{{ $task->task_name }} - {{ $task->deadline }}
                                    <div class="button-list">
                                        <form action="/task-done/{{ $task->id }}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <button type="submit" id="done-button">DONE</button>
                                        </form>
                                        <form action="/delete-task/{{ $task->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" id="delete-button">DELETE</button>
                                        </form>
                                    </div>
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>
                <br>
            </div>
            <br><br>
            <div class="card-3">
                <h1 id="complete-title">Completed Task</h1>
                <ul id="task-list">
                    @foreach ($tasks as $task)
                        @if ($task->is_done == 1)
                            @if ($task->user_id == auth()->id())
                                <li id="complete-text">{{ $task->task_name }} -
                                    {{ $task->deadline }}
                                    <form action="/task-restore/{{ $task->id }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" id="revert-button">REVERT</button>
                                    </form>
                                </li>
                            @endif
                        @endif
                    @endforeach

                </ul>
                <br>
            </div>
        </div>
        </div>
        </div>
    </main>
</body>

</html>
