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
                                    <h6 class="font-weight-semibold text-lg mb-0">Your Profile</h6>
                                    <p class="text-sm">Rewrite if you want to change then click the update button</p>
                                </div>
                                {{-- <div class="ms-auto d-flex">
                                    <a href="/event/create"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                        <span class="btn-inner--icon">
                                            <img src="{{ asset('assets/img/logos/event-add.png') }}" alt=""
                                                width="16px" height="18px">
                                        </span>
                                        <span class="btn-inner--text  ms-2">Add Event</span>
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="card-body align-items-center">
                            <div class="d-sm-flex align-items-center">
                                <div class="container py-2 px-0">
                                    <form action="profile/change/{{ $user->id }}" method="post">
                                        @csrf
                                        <div class="row py-4">
                                            <div class="col-6 py-3">
                                                <label for="name" class="">Name :</label>
                                                <input type="text" name="name" id="" class="form-control"
                                                    value="{{ $user->name }}">
                                            </div>
                                            <div class="col-6 py-3">
                                                <label for="name" class="">Username :</label>
                                                <input type="text" name="username" id="" class="form-control"
                                                    value="{{ $user->username }}">
                                            </div>
                                            <div class="col-6 py-3">
                                                <label for="name" class="">Email :</label>
                                                <input type="email" name="email" id="" class="form-control"
                                                    value="{{ $user->email }}">
                                            </div>
                                            <div class="col-6 py-3">
                                                <label for="name" class="">No.Tel :</label>
                                                <input type="text" name="nohp" id="" class="form-control"
                                                    value="{{ $user->nohp }}">
                                            </div>
                                            <div class="col-6 py-3">
                                                <label for="name" class="">Address :</label>
                                                <textarea name="address" id="" cols="3" rows="2" class="form-control">{{ $user->address }}</textarea>
                                            </div>
                                            <div class="col-6 py-3">
                                                <label for="name" class="">Level :</label>
                                                <input type="text" name="level" id="" class="form-control"
                                                    value="{{ $user->level }}">
                                            </div>
                                            <div class="col-6 py-3">
                                                <label for="name" class="">Password :</label>
                                                <input type="password" name="pasword" id=""
                                                    class="form-control" value="{{ $user->password }}" placeholder="Enter Change Password">
                                            </div>
                                            <div class="col-12 py-3">
                                                <input type="submit" value="Change Your Profile" id=""
                                                    class=" btn btn-dark w-100">
                                            </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
