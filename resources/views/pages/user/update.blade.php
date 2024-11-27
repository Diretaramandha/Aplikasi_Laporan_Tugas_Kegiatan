@extends('layout.side-bar')
@section('main')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">User Update</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">User update</li>
                </ol>
                <h6 class="font-weight-bold mb-0">User Update</h6>
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
                                <h6 class="font-weight-semibold text-lg mb-0">Users Update</h6>
                                <p class="text-sm">You can update a user</p>
                            </div>
                            <div class="ms-auto d-flex">
                                <a href="/user" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
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
                        <form action="/user/update/{{ $user->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 px-5 py-2 pt-4">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ $user->name }}">
                                </div>
                                <div class="col-12 px-5 py-2">
                                    <label for="name">Username</label>
                                    <input type="text" name="username" id="" class="form-control" placeholder="Enter Username" value="{{ $user->username }}">
                                </div>
                                <div class="col-12 px-5 py-2">
                                    <label for="name">Email</label>
                                    <input type="email" name="email" id="" class="form-control" placeholder="Enter Email" value="{{ $user->email }}">
                                </div>
                                <div class="col-12 px-5 py-2">
                                    <label for="name">No.Tel</label>
                                    <input type="text" name="nohp" id="" class="form-control" placeholder="Enter No.Tel" value="{{ $user->nohp }}">
                                </div>
                                <div class="col-12 px-5 py-2">
                                    <label for="name">Address</label>
                                    <textarea name="address" id="" cols="30" rows="5" placeholder="Enter Address" class="form-control">{{ $user->address }}</textarea>
                                </div>
                                <div class="col-12 px-5 py-2">
                                    <label for="name">Status</label>
                                    <select name="level" id="" class="form-select" >
                                        <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="member" {{ $user->level == 'member' ? 'selected' : '' }}>Member</option>
                                    </select>
                                </div>
                                <div class="col-12 px-5 py-2">
                                    <label for="name">Password </label>
                                    <input type="text" name="password" id="" class="form-control" placeholder="Enter Password" value="{{ $user->password }}">
                                </div>
                                <div class="col-12 px-5 py-4">
                                    <input type="submit" value="Update" class="btn btn-dark w-100">
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
