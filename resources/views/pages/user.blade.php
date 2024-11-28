@extends('layout.side-bar')
@section('main')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">User</li>
                </ol>
                <h6 class="font-weight-bold mb-0">User</h6>
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
                                <h6 class="font-weight-semibold text-lg mb-0">Users list</h6>
                                <p class="text-sm">See information about all users</p>
                            </div>
                            <div class="ms-auto d-flex">
                                <a href="/user/create" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2" data-bs-toggle="tooltip" data-bs-title="Add user">
                                    <i class="fa-solid fa-user-plus" style="font-size: 1rem"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 py-0">
                        <div class="table-responsive px-4 py-3 ">
                            <table id="myTable" class="table align-items-center mb-0 display">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">No
                                        </th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">Name
                                        </th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                            No.tel / Address</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                            Status</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                            User Created</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $item)
                                    <tr>
                                        <td>
                                            <p class="text-sm text-secondary mb-0 ms-4">{{ $key+1 }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center ms-1">
                                                    <h6 class="mb-0 text-sm font-weight-semibold">{{ $item->name }}</h6>
                                                    <p class="text-sm text-secondary mb-0">{{ $item->email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm text-dark font-weight-semibold mb-0">+ {{ $item->nohp }}</p>
                                            <p class="text-sm text-secondary mb-0">{{ $item->address }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($item->level == 'admin')
                                            <span class="badge badge-sm border border-success text-success bg-success">{{ $item->level }}</span>
                                            @else
                                            <span class="badge badge-sm border border-secondary text-secondary bg-secondary">{{ $item->level }}</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-normal">{{ $item->created_at }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="/user/update/{{ $item->id }}" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                                                <i class="fa-solid fa-user-pen" style="font-size: 1rem"></i>
                                            </a>
                                            <a href="/user/delete/{{ $item->id }}" class="text-secondary font-weight-bold text-xs ms-2" data-bs-toggle="tooltip" data-bs-title="Delete user">
                                                <i class="fa-solid fa-trash" style="font-size: 1rem"></i>
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
