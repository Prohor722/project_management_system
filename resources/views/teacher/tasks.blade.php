@extends('layouts.teacher_layout')

@section('teacher_content')

    <div class="container-fluid">
        <div class="row">

            <!-- Add task  -->
            <div class="col-md-3 bg bg-light py-5 left-container">

                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach

                <form class="" action="/teacher/tasks" method="POST">
                    <h4 class="mb-3 text-center">Add Task</h4>
                    @csrf
                    <div class="mb-3">
                        <label for="taskTitle" class="form-label">Task Title</label>
                        <input type="text" name="task_title" class="form-control" id="taskTitle" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" name="task_description" class="form-control" id="description" aria-describedby="emailHelp"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="date" name="deadline" class="form-control" id="deadline">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>

            </div>
            <div class="col-md-9 pt-lg-3 pb-3 right-container">

                <!-- Search bar  -->
                <form class="d-flex align-items-center ms-auto mb-3 border rounded-pill" id="search">
                    <input class="form-control me-2 rounded-pill border-0" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn border-0 text-dark p-0" id="search-icon" type="submit"><i class="fas fa-search"></i></button>
                </form>

                <!-- students list  -->

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Date</th>
                        <th scope="col">Task Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Submissions</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i= ($tasks->currentPage()-1) * 5; ?>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$task->created_at}}</td>
                                <td class="text-break">{{$task->task_title}}</td>
                                <td class="text-break">{{$task->task_description}}</td>
                                <td>{{$task->deadline}}</td>
                                <td><a href="#">Check Submissions</a></td>
                                <td class="mt-2">
                                    <div class="d-flex">
                                        <a href="{{url('/teacher/tasks/'.$task->id)}}" class="">
                                            <button class="btn btn-info me-1">Edit</button>
                                        </a>
                                        <form action="/teacher/tasks/{{$task->id}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this task: {{$task->task_title}} ?')"
                                            class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                    @if(session('taskError') && session('taskError')[1]==$task->id)
                                    <p class="text-danger mt-1">{{session('taskError')[0]}}</p>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{$tasks->links()}}
                </div>
            </div>

        </div>
    </div>

@endsection
