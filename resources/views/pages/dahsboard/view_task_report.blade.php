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
                    <h6 class="font-weight-bold mb-0">Detail Report</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                    class="fixed-plugin-button-nav cursor-pointer" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        {{-- #757474 --}}
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor" class="cursor-pointers">
                                    <path fill-rule="evenodd"
                                        d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item ps-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm" alt="avatar" />
                            </a>
                        </li>
                    </ul>
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
                                    <h6 class="font-weight-semibold text-lg mb-0">Detail Report</h6>
                                    <p class="text-sm">make an event and of course the members will</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <a href="javascript:void(0);" onclick="window.history.back();"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2 w-100">
                                        <span class="btn-inner--text">Back</span>
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
                                                Task</th>
                                            {{-- <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Report</th> --}}
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Sub Task</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $key => $item)
                                            <tr>
                                                <td>
                                                    <p class="fw-bold ms-3 my-2">{{ $key + 1 }}</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center ms-1">
                                                            <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                                {{ $item->event->name ?? 'N/A' }}
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
                                                                {{ $item->name }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td> --}}
                                                <td class="align-middle ">
                                                    <a href="/dashboard/report/task/{{ $item->id_event }}/{{ $item->id }}"
                                                        class="btn btn-sm btn-dark btn-icon my-2 opacity-5">
                                                        <i class="fa-solid fa-file-export fs-6"></i>
                                                    </a>
                                                </td>
                                                {{-- <td>
                                                    <div class="progress" style="width: 100%; height: 30px;">
                                                        <div class="progress-bar progress-bar-striped"
                                                            style="width: {{ $item->progress == null ? '10' : $item->progress }}%; height: 100%;">
                                                            {{ round($item->progress) }}%
                                                        </div>
                                                    </div>
                                                </td> --}}
                                                <td>
                                                    @php
                                                        if ($reports[$item->id]->count() > 0) {
                                                            $countReport = $reports[$item->id]->count();
                                                            $done = collect($reports[$item->id])->sum('has_details');
                                                            $progress = ($done / $countReport) * 100;
                                                        } else {
                                                            $progress = 0;
                                                        }

                                                        // echo round($progress).'%';
                                                    @endphp

                                                    <div class="progress" style="width: 100%; height: 30px;">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                             style="width: {{ $progress == 0 ? 10 : round($progress) }}%; height: 100%;">
                                                            {{ round($progress) }}%
                                                        </div>
                                                    </div>
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
