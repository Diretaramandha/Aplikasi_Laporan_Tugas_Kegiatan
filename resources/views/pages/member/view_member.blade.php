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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add User</li>
                    </ol>
                    <h6 class="font-weight-bold mb-0">Add User</h6>
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
                                    <h6 class="font-weight-semibold text-lg mb-0">Users list</h6>
                                    <p class="text-sm">See information about all users</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <a href="/member/create"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                        <span class="btn-inner--icon">
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                                                <path
                                                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                            </svg>
                                        </span>
                                        <span class="btn-inner--text">Add Member</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                                {{-- <form action="/add-user" method="POST" class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                @csrf
                                <input type="radio" class="btn-check" name="level" id="radio" value="all" autocomplete="off" checked>
                                <label class="btn btn-white px-3 mb-0" for="radio">All</label>
                                <input type="radio" class="btn-check" name="level" id="radio2" value="admin" autocomplete="off">
                                <label class="btn btn-white px-3 mb-0" for="radio2">Admin</label>
                                <input type="radio" class="btn-check" name="level" id="radio3" value="member" autocomplete="off">
                                <label class="btn btn-white px-3 mb-0" for="radio3">Member</label>
                            </form> --}}
                                <form action="/add-user" method="POST" class="input-group w-sm-25 ms-auto">
                                    @csrf
                                    <span class="input-group-text text-body">
                                        <button type="submit" class="border-0 bg-transparent w-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                                </path>
                                            </svg>
                                        </button>
                                    </span>
                                    <input type="search" class="form-control" name="search" placeholder="Search">
                                </form>
                            </div>
                            <div class="table-responsive p-0 ">
                                <table id="tabel-data" class="table align-items-center mb-0">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">No
                                            </th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Name Member
                                            </th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Email</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Task</th>
                                            {{-- <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Report</th> --}}
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($member as $key => $item)
                                            <tr>
                                                <td>
                                                    <p class="text-sm text-secondary mb-0 ms-4 ">{{ $key + 1 }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm text-secondary mb-0 ms-3 ">{{ $item->user->name }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm text-secondary mb-0">{{ $item->user->email }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-sm text-secondary mb-0">{{ $item->tasks->name }}
                                                </td>
                                                {{-- <td class="align-middle text-center">
                                                    <p class="text-sm text-secondary mb-0">{{ $item->tasks->report->name }}
                                                </td> --}}
                                                <td class="align-middle text-center">
                                                    <a href="/member/update/{{ $item->id }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-bs-toggle="tooltip" data-bs-title="Edit Member">
                                                        <svg width="14" height="14" viewBox="0 0 15 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z"
                                                                fill="#64748B" />
                                                        </svg>
                                                    </a>
                                                    <a href="member/delete/{{ $item->id }}"
                                                        class="text-secondary font-weight-bold text-xs ms-2"
                                                        data-bs-toggle="tooltip" data-bs-title="Edit Member">
                                                        <img src="{{ asset('img/delete.png') }}" alt=""
                                                            width="16" height="18" srcset="">
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
    {{-- <script>
    document.querySelectorAll('input[name="btnradiotable"]').forEach((elem) => {
        elem.addEventListener("change", function(event) {
            let selectedLevel = event.target.value;
            fetch(`/add-user?level=${selectedLevel}`, { // Changed to GET
                    method: 'GET' // Changed to GET
                    , headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                        , 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                    // No need for body in a GET request
                })
                .then(response => response.text())
                .then(data => {
                    document.querySelector('#tabel-data tbody').innerHTML = data;
                });
            .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    document.querySelector('#tabel-data tbody').innerHTML = data;
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        });
    });

</script> --}}
@endsection
