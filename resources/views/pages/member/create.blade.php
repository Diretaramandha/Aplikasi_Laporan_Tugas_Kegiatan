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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Member</li>
                    </ol>
                    <h6 class="font-weight-bold mb-0">Member Create</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                </div>
            </div>
        </nav>
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12 ">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Member Create</h6>
                                    <p class="text-sm">You can add a Member</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <a href="/member" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                        <span class="btn-inner--icon">
                                            {{-- <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                                            <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                        </svg> --}}
                                        </span>
                                        <span class="btn-inner--text">Back</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <form action="/member/create" method="post">
                                @csrf
                                <div class="row mx-3">
                                    <div class="col-sm-3 col-md-6 col-lg-12 my-2">
                                        <label for="user">User :</label>
                                        <select name="user_id" id="user" class="form-select">
                                            <option value=""></option>
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}">Name Member : {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col-md-6 col-lg-12 my-2">
                                        <label for="task">Task :</label>
                                        <select name="task_id" id="task" class="form-select">
                                            <option value=""></option>
                                            @foreach ($tasks as $item)
                                                <option value="{{ $item->id }}">
                                                    Task : {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col-md-6 col-lg-12 my-2">
                                        <input type="submit" value="Create" class="btn btn-secondary w-100">
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- End Navbar -->
    </main>
@endsection
