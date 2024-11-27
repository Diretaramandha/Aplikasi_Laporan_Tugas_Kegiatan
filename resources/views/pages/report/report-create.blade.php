@extends('layout.side-bar')
@section('main')
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Event</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Task</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Report</li>
                    </ol>
                    <h6 class="font-weight-bold mb-0">Report Task</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    
                </div>
            </div>
        </nav>
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12 ">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Report Task  : {{ $task->name }}</h6>
                                    <p class="text-sm">add report task</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <a href="/report/task/{{ $id_event }}/{{ $task->id }}" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                        <span class="btn-inner--icon">

                                        </span>
                                        <span class="btn-inner--text">Back</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <form action="/report/create/{{ $id_event }}/{{ $task->id }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12 px-5 py-2 pt-4">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                                    </div>
                                    <div class="col-12 px-5 py-2">
                                        <label for="time">Date & Time</label>
                                        <input type="datetime-local" name="duetime" id="time" class="form-control" placeholder="Enter Time">
                                    </div>
                                    {{-- <div class="col-12 px-5 pt-4">
                                        <input type="submit" value="Create Sub Task" class="btn btn-dark w-100">
                                    </div> --}}
                                    <div class="col-12 px-5 py-4">
                                        <input type="submit" value="Create Report" class="btn btn-dark w-100">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Navbar -->
@endsection
