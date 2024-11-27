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
                                            <i class="fi fi-br-plus" style="font-size: 1rem"></i>
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
                                                        class="btn btn-sm btn-dark btn-icon me-2 my-2 opacity-5"
                                                        data-bs-toggle="tooltip" data-bs-title="Detail Task">
                                                        <span class="btn-inner--icon">
                                                            <i class="fi fi-ss-to-do" style="font-size: 1rem"></i>
                                                        </span>
                                                    </a>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/event/update/{{ $item->id }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-bs-toggle="tooltip" data-bs-title="Edit">
                                                        <svg width="14" height="14" viewBox="0 0 15 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z"
                                                                fill="#64748B" />
                                                        </svg>
                                                    </a>
                                                    <a href="/event/delete/{{ $item->id }}"
                                                        class="text-secondary font-weight-bold text-xs ms-3"
                                                        data-bs-toggle="tooltip" data-bs-title="Delete">
                                                        <img src="{{ asset('img/delete.png') }}" alt=""
                                                            class="" width="18px" height="20px">
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
