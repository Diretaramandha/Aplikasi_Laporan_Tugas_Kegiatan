@extends('layout.side-bar')
@section('main')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Event</li>
                    </ol>
                    <h6 class="font-weight-bold mb-0">Event</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12 ">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Event list</h6>
                                    <p class="text-sm">make an event and of course the members will</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <a href="/event/create"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2 opacity-5"
                                        data-bs-toggle="tooltip" data-bs-title="Add Event">
                                        <span class="btn-inner--icon">
                                            <i class="fa-solid fa-calendar-plus" style="font-size: 1rem"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4 py-3">
                            <div class="table-responsive p-0 ">
                                <table id="myTable" class="table align-items-center mb-0 display">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">No
                                            </th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Event
                                            </th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Description</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Date</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Task</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $key => $item)
                                            <tr>
                                                <td>
                                                    <p class="fw-bold ms-3 my-2">{{ $key + 1 }}</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center ms-1">
                                                            <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                                {{ $item->name }}</h6>
                                                        </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm text-secondary mb-0">{{ $item->description }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm text-secondary mb-0">{{ $item->date }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/task/{{ $item->id }}"
                                                        class=" me-2 my-2 opacity-5"
                                                        data-bs-toggle="tooltip" data-bs-title="Detail Task">
                                                        <span class="btn-inner--icon">
                                                            <i class="fi fi-ss-to-do" style="font-size: 1.5rem"></i>
                                                        </span>
                                                    </a>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/event/update/{{ $item->id }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-bs-toggle="tooltip" data-bs-title="Edit Event">
                                                        <i class="fa-solid fa-file-pen" style="font-size: 1.2rem"></i>
                                                    </a>
                                                    <a href="/event/delete/{{ $item->id }}"
                                                        class="text-secondary font-weight-bold text-xs ms-3"
                                                        data-bs-toggle="tooltip" data-bs-title="Delete Event">
                                                        <i class="fa-solid fa-trash" style="font-size: 1.2rem"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
