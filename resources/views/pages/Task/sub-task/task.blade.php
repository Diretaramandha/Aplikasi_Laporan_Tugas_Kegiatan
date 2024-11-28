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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Task</li>
                    </ol>
                    <h6 class="font-weight-bold mb-0">Task</h6>
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
                                    <h6 class="font-weight-semibold text-lg mb-0">Task</h6>
                                    <p class="text-sm mb-sm-0">You can see the tasks that are in the main task</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <a href="/task/{{ $id_event }}"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2 opacity-5"
                                        data-bs-toggle="tooltip" data-bs-title="Back">
                                        <i class="fa-solid fa-arrow-left" style="font-size: 1rem"></i>
                                    </a>
                                    <a href="/task/{{ $id_event }}/sub-task/{{ $id_task }}/create"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2 opacity-5"
                                        data-bs-toggle="tooltip" data-bs-title="Add Task">
                                        <i class="fa-solid fa-file-circle-plus" style="font-size: 1rem"></i>
                                    </a>
                                    <a href="/report/task/{{ $id_event }}/{{ $id_task }}"
                                        onclick="window.history.back();"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2 opacity-5"
                                        data-bs-toggle="tooltip" data-bs-title="Report Main Task">
                                        <i class="fi fi-rr-file-medical-alt" style="font-size: 1rem;"></i>
                                    </a>
                                </div>
                                {{-- <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2 w-25">
                                <span class="btn-inner--text">Back</span>
                            </a> --}}
                            </div>
                        </div>
                        <div class="card-body px-4 py-3">
                            <div class="table-responsive p-0">
                                <table id="myTable" class="table align-items-center mb-0 display">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">
                                                No.</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">
                                                Task</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Description</th>
                                            {{-- <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                            Sub Task</th> --}}
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Member
                                            </th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Sub task
                                            </th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sub_task as $key => $item)
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
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm text-secondary mb-0">{{ $item->description }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-sm text-secondary mb-0">
                                                        @if ($item->members == null)
                                                            No Member
                                                        @else
                                                            <span class="badge bg-secondary">{{ $member->name }}</span>
                                                        @endif
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/task/{{ $item->event->id }}/sub-task/{{ $item->id }}"
                                                        class=" me-2 my-2 opacity-5" data-bs-toggle="tooltip"
                                                        data-bs-title="Detail Task">
                                                        <i class="fi fi-ss-to-do" style="font-size: 1.5rem"></i>
                                                    </a>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/task/{{ $item->event->id }}/sub-task/{{ $id_task }}/update/{{ $item->id }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-bs-toggle="tooltip" data-bs-title="Edit">
                                                        <i class="fa-solid fa-file-pen" style="font-size: 1.2rem"></i>
                                                    </a>
                                                    <a href="/task/{{ $item->event->id }}/sub-task/{{ $id_task }}/delete/{{ $item->id }}"
                                                        class="text-secondary font-weight-bold text-xs ms-3"
                                                        data-bs-toggle="tooltip" data-bs-title="Delete">
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
