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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Export</li>
                    </ol>
                    <h6 class="font-weight-bold mb-0">Export Excel</h6>
                </nav>

            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4 px-5">
            <div class="col-lg-12 col-md-6">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center mb-3">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Export to Excel</h6>
                                <p class="text-sm mb-sm-0">Your event</p>
                            </div>
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
                                            Event</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                            Description</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                            Date</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                            Task</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($event as $key => $item)
                                        <tr>
                                            <td>
                                                <p class="fw-bold ms-3 my-2">{{ $key + 1 }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center ms-1 ">
                                                        <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                            {{ $item->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">{{ $item->description }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm text-secondary mb-0">{{ $item->date }}</p>
                                            </td>
                                            <td class="">
                                                <a href="/export-excel/tasks/{{ $item->id }}"
                                                    class="btn btn-secondary opacity-6 my-2" data-bs-toggle="tooltip"
                                                    data-bs-title="Export Excel">
                                                    <i class="fa-solid fa-file-excel" style="font-size: 1rem"></i>
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
