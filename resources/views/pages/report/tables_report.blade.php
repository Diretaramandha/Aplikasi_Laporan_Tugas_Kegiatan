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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Event</a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Task</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Report</li>
                    </ol>
                    <h6 class="font-weight-bold mb-0">Report</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center mb-3">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Report</h6>
                                    <p class="text-sm mb-sm-0">You can see the main tasks that are in the event</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <a href="/task/{{ $id_event }}/sub-task/{{ $id_task }}"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2 opacity-5">
                                        <i class="fa-solid fa-arrow-left" style="font-size: 1rem"></i>
                                    </a>
                                    <a href="/report/create/{{ $id_event }}/{{ $id_task }}"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2 opacity-5"
                                        data-bs-toggle="tooltip" data-bs-title="Add Report">
                                        <i class="fa-solid fa-file-circle-plus" style="font-size: 1rem"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4 py-3">
                            <div class="table-responsive p-0">
                                <table id="myTable" class="table align-items-center mb-0 display">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">No.</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Event</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Task</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Name Report
                                            </th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Deadline
                                            </th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($task as $key => $item)
                                            <tr>
                                                <td>
                                                    <p class="fw-bold ms-3 my-2">{{ $key + 1 }}</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center ms-1">
                                                            <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                                {{ $item->tasks->event->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-2">
                                                        <div class="d-flex flex-column justify-content-center ms-1">
                                                            <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                                {{ $item->tasks->name }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-2">
                                                        <div class="d-flex flex-column justify-content-center ms-1">
                                                            <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                                {{ $item->name }} <!-- Perbaikan di sini -->
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-2">
                                                        <div class="d-flex flex-column justify-content-center ms-1">
                                                            <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                                {{ $item->duetime }} <!-- Perbaikan di sini -->
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="/report/update/{{ $id_event }}/{{ $id_task }}/{{ $item->id }}" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit">
                                                        <i class="fa-solid fa-file-pen" style="font-size: 1.2rem"></i>
                                                    </a>
                                                    <a href="/report/delete/{{ $item->id }}" class="text-secondary font-weight-bold text-xs ms-2" data-bs-toggle="tooltip" data-bs-title="Delete">
                                                        <i class="fa-solid fa-trash" style="font-size: 1.2rem"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
