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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Progress</li>
                    </ol>
                    <h6 class="font-weight-bold mb-0">Progress Task Event</h6>
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
                                                        class=" my-2 opacity-5">
                                                        <i class="fa-solid fa-file-export " style="font-size: 1.8rem"></i>
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
