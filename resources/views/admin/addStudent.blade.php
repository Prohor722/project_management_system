@extends('layouts.admin_layout')

@section('admin_content')

    <div class="row g-0">

        <!-- Student Information section  -->
        <div class="col-md-3 d-flex flex-column align-items-center p-3 short-text">
            <img id="info-img" class="my-3 w-50" src="{{asset('images/users/student.jpg')}}">
            <h4>Students Information</h4>
            <h6 class="mt-3">Name: <span id="student-name"></span></h6>
            <div>
                <h6 class="mt-3 d-inline">ID: </h6>
                <span id="student-name"></span>
            </div>
            <div>
                <h6 class="mt-3 d-inline">Department: </h6>
                <span id="student-name"></span>
            </div>
        </div>
        <div class="col-md-9 px-5 bg  ">

            <!-- Add student inputs  -->
            <form action="{{url('/admin/student')}}" method="POST">
                <div class="d-flex flex-column align-items-center justify-content-center my-5 pb-5">
                    <div class="row col-md-5">
                        @csrf
                        <label for="student_id" class="form-label">Student ID</label>
                        <input type="text" name="student_id" class="form-control" id="student_id" aria-describedby="emailHelp">

                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="student_name" id="name" class="form-control" aria-describedby="emailHelp">

                        <label for="department" class="form-label">Department</label>
                        <input type="text" id="department" name="department" class="form-control" aria-describedby="emailHelp">

                        <button type="submit" class="btn btn-info pb-3 my-5 w-100">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
