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
                                    <div class="input-group input-group-sm ms-auto me-2">
                                        <span class="input-group-text text-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                                </path>
                                            </svg>
                                        </span>
                                        <input type="text" class="form-control form-control-sm" placeholder="Search">
                                    </div>
                                    {{-- <a href=""
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2 w-50">
                                        <span class="btn-inner--text">Create Task</span>
                                    </a>
                                    <a href="/event"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2 w-25">
                                        <span class="btn-inner--text">Back</span>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">
                                                No.</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">
                                                Event</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Main Task</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                report</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($report as $key => $item)
                                            <tr>
                                                <td>
                                                    <p class="fw-bold ms-3 my-2">{{ $key + 1 }}</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center ms-1">
                                                            <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                                {{ $item->event->name }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center ms-1">
                                                            <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                                {{ $item->name }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{-- <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center ms-1">
                                                            <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                                {{ $item->task}}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td> --}}
                                                <td class="align-middle ">
                                                    <a href="/report/task/{{ $item->event->id }}/{{ $item->id }}"
                                                        class="btn btn-sm btn-dark btn-icon me-2 my-2 opacity-5">
                                                            <i class="fa-solid fa-file-export fs-6"></i>
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
