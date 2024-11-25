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
                                <p class="text-sm mb-sm-0">Tasks in event {{ $event->name }}</p>
                            </div>
                            <div class="ms-auto d-flex">
                                <a href="/export-excel/tasks/{{ $event->id }}/export    " class="btn btn-sm btn-success btn-icon d-flex align-items-center mb-0 me-2 w-100">
                                    <span class="btn-inner--text">Export to Excel</span>
                                </a>
                                <a href="javascript:void(0);" onclick="window.history.back();"
                                    class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2 w-100">
                                    <span class="btn-inner--text">Back</span>
                                </a>
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
                                            Member</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">
                                            Task</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                            Description</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                            Main Task</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                            report</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                            File</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                            link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $key => $item)
                                        <tr>
                                            <td>
                                                <p class="fw-bold text-secondary ms-3 my-2">{{ $key + 1 }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center ms-1 ">
                                                        <p class="my-2 text-secondary">
                                                            @if ($item->member != null)
                                                                @foreach ($item->member as $member)
                                                                    {{ $member->user->name ?? '' }}
                                                                @endforeach
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d -flex flex-column justify-content-center ms-1 ">
                                                        <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                            {{ $item->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center ms-1 ">
                                                        <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                            {{ $item->description }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center ms-1 ">
                                                        <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                            @if ($item->subTask == null)
                                                                it's Main task in {{ $item->event->name }}
                                                            @else
                                                                {{ $item->subTask->name }}
                                                            @endif
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center ms-1 ">
                                                        <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                            @if ($item->report == null)
                                                                belum ada report
                                                            @else
                                                                @foreach ($item->report as $report)
                                                                    {{ $report->name }} ,
                                                                @endforeach
                                                            @endif
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center ms-1 ">
                                                        <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                            @if ($item->report != null)
                                                            @foreach ($item->report as $report)
                                                                {{ $report->detailReport->file_upload ?? '' }}
                                                            @endforeach
                                                        @endif
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center ms-1 ">
                                                        <h6 class="mb-0 text-sm font-weight-semibold text-secondary">
                                                            @if ($item->report != null)
                                                            @foreach ($item->report as $report)
                                                                {{ $report->detailReport->link_file ?? '' }}
                                                            @endforeach
                                                        @endif
                                                        </h6>
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
