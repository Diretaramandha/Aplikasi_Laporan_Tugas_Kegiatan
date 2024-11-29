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
                    <h6 class="font-weight-bold mb-0">Task</h6>
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
                                    <h6 class="font-weight-semibold text-lg mb-0">Your Task</h6>
                                    <p class="text-sm">See information about all users</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <a href="/member/task"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2 opacity-5"
                                        data-bs-toggle="tooltip" data-bs-title="Back">
                                        <i class="fa-solid fa-arrow-left" style="font-size: 1rem"></i>
                                    </a>
                                    <a href="/upload/detail-report/{{ $report->id }}"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2 opacity-5"
                                        data-bs-toggle="tooltip" data-bs-title="Upload Detail report">
                                        <i class="fa-solid fa-upload" style="font-size: 1rem"></i>
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
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Detail Report</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Report
                                            </th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Action</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                File</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($upload as $key => $item)
                                            <tr>
                                                <td>
                                                    <p class="text-sm text-secondary mb-0 ms-4 ">{{ $key + 1 }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm text-secondary mb-0 ms-3 ">{{ $item->description }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm text-secondary mb-0 ms-3 ">{{ $item->report->name }}
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/upload/update/{{ $report->id }}/{{ $item->id }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-bs-toggle="tooltip" data-bs-title="Edit">
                                                        <i class="fa-solid fa-file-pen" style="font-size: 1.2rem"></i>
                                                    </a>
                                                    <a href="/upload/delete/{{ $item->id }}"
                                                        class="text-secondary font-weight-bold text-xs ms-2"
                                                        data-bs-toggle="tooltip" data-bs-title="Delete">
                                                        <i class="fa-solid fa-trash" style="font-size: 1.2rem"></i>
                                                    </a>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-sm text-secondary mb-0 ms-3">
                                                        @if ($item->link_file == null)
                                                            Tidak Upload File
                                                        @endif
                                                        {{ $item->link_file }}
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-sm text-secondary mb-0 ms-3 ">
                                                        @if ($item->file_upload == null)
                                                            Tidak Upload File
                                                        @else
                                                            <img src="{{ asset('storage/file/' . $item->file_upload) }}"
                                                                alt="" width="80rem" height="80rem">
                                                        @endif
                                                    </p>
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
