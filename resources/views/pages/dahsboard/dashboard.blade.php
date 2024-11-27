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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bold mb-0">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <div class="mb-md-0 mb-3">
                            <h3 class="font-weight-bold mb-0">Hello, {{ auth()->user()->name }}</h3>
                            <p class="mb-0">What event are you going to make?</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="row my-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <img src="{{ asset('assets/img/logos/event.png') }}" width="20px" height="20px"
                                    alt="" srcset="">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">Total Your events :</p>
                                        <h4 class="mb-2 font-weight-bold">{{ $event->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <img src="{{ asset('assets/img/logos/event.png') }}" width="20px" height="20px"
                                    alt="" srcset="">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">Total of all events :</p>
                                        <h4 class="mb-2 font-weight-bold">{{ $event_all }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-sm-6 mb-xl-0">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <img src="{{ asset('img/member-white.png') }}" width="20px" height="20px"
                                    alt="" srcset="">

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">Total of all members</p>
                                        <h4 class="mb-2 font-weight-bold">{{ $member->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12 col-md-6">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center mb-3">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Event</h6>
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
                                                View Progress Task</th>
                                            {{-- <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Progress Event</th> --}}
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
                                                        <h6 class="mb-0 text-sm font-weight-semibold text-secondary">{{ $item->name }}</h6>
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
                                                <a href="/dashboard/report/{{ $item->id }}" class=" opacity-5 my-2" data-bs-toggle="tooltip" data-bs-title="Progress Task">
                                                    <i class="fa-solid fa-bars-progress" style="font-size: 2rem"></i>
                                                </a>
                                            </td>
                                            {{-- <td>
                                                <div class="progress" style="width: 100%; height: 30px;">
                                                    <div class="progress-bar progress-bar-striped" style="width: {{ $event->progress == 0 ? '10' : round($event->progress) }}%; height: 100%;">
                                                        {{ round($event->progress) }}%
                                                    </div>
                                                </div>
                                            </td> --}}
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
