@extends('layouts.admin_layout')

@section('admin_content')

<style>
    .margin-b{
        margin-bottom: 32px;
    }
</style>

<div class="container-fluid">
    <div class="row">

        <!-- Student Information section  -->
        <div class="col-md-3 d-flex bg-light flex-column align-items-center px-3 py-4 short-text">
            <img id="info-img" class="my-4 pt-4 w-50" src="{{asset('images/users/student.jpg')}}">
            <h4>Students Information</h4>
            <h6 class="mt-3">Name: <span id="student-name">Full Name</span></h6>
            <div>
                <h6 class="mt-3 d-inline">ID: {{$student->student_name}}</h6>
            </div>
            <div>
                <h6 class="mt-3 d-inline">Department: {{$student->department}}</h6>
            </div>
            <div>
                <h6 class="mt-3 d-inline">Email: {{$student->email}}</h6>
            </div>
            <div>
                <h6 class="mt-3 d-inline">Status:
                    <span class="text-success @if(!$student->status) text-danger @endif">
                        {{ ($student->status)? "Active" : "In-Active"}}
                    </span>
                </h6>
            </div>
        </div>

        <div class="col-md-9 px-5 mt-5 ">

            <!-- Update Student Data  -->
            <form action="/admin/student/{{$student->id}}" method="POST">
                <div class="d-flex flex-column align-items-center justify-content-center mt-5 mb-4">
                    <div class="row col-md-9 gy-0">
                        @method('put')
                        @csrf
                        <div class="col-md-6">
                            <label for="student_id" class="form-label">Student ID</label>
                            <input type="text" name="student_id" class="form-control
                            @error('student_id') mb-0 border border-danger @else margin-b @endif"
                                id="student_id" value="{{old('student_id',$student->student_id)}}">
                                @error('student_id')
                                    <p class="text-danger mb-2">{{$message}}</p>
                                @enderror

                            <label for="department" class="form-label">Department</label>
                            <input type="text" id="department" name="department" class="form-control
                                @error('department') border border-danger @else margin-b @endif"
                                value="{{old('department',$student->department)}}">
                                @error('department')
                                    <p class="text-danger mb-2">{{$message}}</p>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="student_name" id="name" class="form-control
                                @error('student_name') border border-danger @else margin-b @endif"
                                value="{{old('student_name',$student->student_name)}}">
                                @error('student_name')
                                    <p class="text-danger mb-2">{{$message}}</p>
                                @enderror

                            <label for="department" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control
                                @error('email') border border-danger @else margin-b @endif"
                                value="{{old('email',$student->email)}}">
                                @error('email')
                                    <p class="text-danger mb-2">{{$message}}</p>
                                @enderror
                        </div>

                        <div class="mt-2 mb-5">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select name="status" class="form-control " id="exampleFormControlSelect1">
                                <option value={{true}}>Active</option>
                                <option value="" @if(!$student->status) selected @endif>In-Active</option>
                            </select>

                            <button type="submit" class="btn btn-success my-4 w-100">Update</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
