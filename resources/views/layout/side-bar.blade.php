<!--
=========================================================
* Corporate UI - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/corporate-ui
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <!-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> -->
    <title>
        System Management Task
    </title>
    <!--     Fonts and icons     -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700"
        rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
    <link href="{{ asset('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('/assets/css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="{{ asset('fontawosome/css/all.min.css') }}">

</head>

<body class="g-sidenav-show  bg-gray-100">
    @if (Auth::user()->level == 'admin')
        <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start "
            id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                    aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand d-flex align-items-center m-0"
                    href=" https://demos.creative-tim.com/corporate-ui-dashboard/pages/dashboard.html " target="_blank">
                    <span class="font-weight-bold text-lg">Activity Task Report</span>
                </a>
            </div>
            <div class="collapse navbar-collapse px-4  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="/dashboard">
                            <div
                                class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg width="30px" height="30px" viewBox="0 0 48 48" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>dashboard</title>
                                    <g id="dashboard" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd">
                                        <g id="template" transform="translate(12.000000, 12.000000)" fill="#FFFFFF"
                                            fill-rule="nonzero">
                                            <path class="color-foreground"
                                                d="M0,1.71428571 C0,0.76752 0.76752,0 1.71428571,0 L22.2857143,0 C23.2325143,0 24,0.76752 24,1.71428571 L24,5.14285714 C24,6.08962286 23.2325143,6.85714286 22.2857143,6.85714286 L1.71428571,6.85714286 C0.76752,6.85714286 0,6.08962286 0,5.14285714 L0,1.71428571 Z"
                                                id="Path"></path>
                                            <path class="color-background"
                                                d="M0,12 C0,11.0532171 0.76752,10.2857143 1.71428571,10.2857143 L12,10.2857143 C12.9468,10.2857143 13.7142857,11.0532171 13.7142857,12 L13.7142857,22.2857143 C13.7142857,23.2325143 12.9468,24 12,24 L1.71428571,24 C0.76752,24 0,23.2325143 0,22.2857143 L0,12 Z"
                                                id="Path"></path>
                                            <path class="color-background"
                                                d="M18.8571429,10.2857143 C17.9103429,10.2857143 17.1428571,11.0532171 17.1428571,12 L17.1428571,22.2857143 C17.1428571,23.2325143 17.9103429,24 18.8571429,24 L22.2857143,24 C23.2325143,24 24,23.2325143 24,22.2857143 L24,12 C24,11.0532171 23.2325143,10.2857143 22.2857143,10.2857143 L18.8571429,10.2857143 Z"
                                                id="Path"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="/user">
                            <div
                                class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/img/logos/add-user.png') }}" alt=""
                                    style="width: 24px; height: 24px;">
                            </div>
                            <span class="nav-link-text ms-1">User</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="/event">
                            <div
                                class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/img/logos/event.png') }}" alt=""
                                    style="width: 22px; height: 22px;">
                            </div>
                            <span class="nav-link-text ms-1">Event</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="/report">
                            <div
                                class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-file fs-5 text-white"></i>
                            </div>
                            <span class="nav-link-text ms-1">Report</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="/event">
                            <div
                                class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <img src="{{ asset('img/excel-white.png') }}" alt=""
                                    style="width: 18px; height: 18px;">
                            </div>
                            <span class="nav-link-text ms-1">Extract to excel</span>
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <div class="d-flex align-items-center nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="ms-2"
                                viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-weight-normal text-md ms-2">Account Pages</span>
                        </div>
                    </li>
                    <li class="nav-item border-start my-0 pt-2">
                        <a class="nav-link position-relative ms-0 ps-2 py-2 " href="/profile">
                            <span class="nav-link-text ms-1">Profile</span>
                        </a>
                        <a class="nav-link position-relative ms-0 ps-2 py-2 " href="/logout">
                            <span class="nav-link-text ms-1">Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
    @else
        <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start "
            id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                    aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand d-flex align-items-center m-0"
                    href=" https://demos.creative-tim.com/corporate-ui-dashboard/pages/dashboard.html "
                    target="_blank">
                    <span class="font-weight-bold text-lg">Activity Task Report</span>
                </a>
            </div>
            <div class="collapse navbar-collapse px-4  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="/dashboard">
                            <div
                                class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <svg width="30px" height="30px" viewBox="0 0 48 48" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>dashboard</title>
                                    <g id="dashboard" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd">
                                        <g id="template" transform="translate(12.000000, 12.000000)" fill="#FFFFFF"
                                            fill-rule="nonzero">
                                            <path class="color-foreground"
                                                d="M0,1.71428571 C0,0.76752 0.76752,0 1.71428571,0 L22.2857143,0 C23.2325143,0 24,0.76752 24,1.71428571 L24,5.14285714 C24,6.08962286 23.2325143,6.85714286 22.2857143,6.85714286 L1.71428571,6.85714286 C0.76752,6.85714286 0,6.08962286 0,5.14285714 L0,1.71428571 Z"
                                                id="Path"></path>
                                            <path class="color-background"
                                                d="M0,12 C0,11.0532171 0.76752,10.2857143 1.71428571,10.2857143 L12,10.2857143 C12.9468,10.2857143 13.7142857,11.0532171 13.7142857,12 L13.7142857,22.2857143 C13.7142857,23.2325143 12.9468,24 12,24 L1.71428571,24 C0.76752,24 0,23.2325143 0,22.2857143 L0,12 Z"
                                                id="Path"></path>
                                            <path class="color-background"
                                                d="M18.8571429,10.2857143 C17.9103429,10.2857143 17.1428571,11.0532171 17.1428571,12 L17.1428571,22.2857143 C17.1428571,23.2325143 17.9103429,24 18.8571429,24 L22.2857143,24 C23.2325143,24 24,23.2325143 24,22.2857143 L24,12 C24,11.0532171 23.2325143,10.2857143 22.2857143,10.2857143 L18.8571429,10.2857143 Z"
                                                id="Path"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="/member">
                            <div
                                class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <img src="{{ asset('img/member-white.png') }}" alt=""
                                    style="width: 22px; height: 22px;">
                            </div>
                            <span class="nav-link-text ms-1">Member</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="/event">
                            <div
                                class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/img/logos/event.png') }}" alt=""
                                    style="width: 22px; height: 22px;">
                            </div>
                            <span class="nav-link-text ms-1">Event</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="/report">
                            <div
                                class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-file fs-5 text-white"></i>
                            </div>
                            <span class="nav-link-text ms-1">Report</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="/event">
                            <div
                                class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                <img src="{{ asset('img/excel-white.png') }}" alt=""
                                    style="width: 18px; height: 18px;">
                            </div>
                            <span class="nav-link-text ms-1">Extract to excel</span>
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <div class="d-flex align-items-center nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="ms-2"
                                viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-weight-normal text-md ms-2">Account Pages</span>
                        </div>
                    </li>
                    <li class="nav-item border-start my-0 pt-2">
                        <a class="nav-link position-relative ms-0 ps-2 py-2 " href="/profile">
                            <span class="nav-link-text ms-1">Profile</span>
                        </a>
                        <a class="nav-link position-relative ms-0 ps-2 py-2 " href="/logout">
                            <span class="nav-link-text ms-1">Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
    @endif
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('sweetalert::alert')
        @yield('main')
        <!-- Navbar -->
        <!-- End Navbar -->
    </main>
    <!--   Core JS Files   -->
    {{-- <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script> --}}
    <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/swiper-bundle.min.js') }}" type="text/javascript"></script>
    <script>
        if (document.getElementsByClassName('mySwiper')) {
            var swiper = new Swiper(".mySwiper", {
                effect: "cards",
                grabCursor: true,
                initialSlide: 1,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        };


        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderSkipped: false,
                    backgroundColor: "#2ca8ff",
                    data: [450, 200, 100, 220, 500, 100, 400, 230, 500, 200],
                    maxBarThickness: 6
                }, {
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderSkipped: false,
                    backgroundColor: "#7c3aed",
                    data: [200, 300, 200, 420, 400, 200, 300, 430, 400, 300],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        backgroundColor: '#fff',
                        titleColor: '#1e293b',
                        bodyColor: '#1e293b',
                        borderColor: '#e9ecef',
                        borderWidth: 1,
                        usePointStyle: true
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        stacked: true,
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4],
                        },
                        ticks: {
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 12,
                                family: "Noto Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#64748B"
                        },
                    },
                    x: {
                        stacked: true,
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            font: {
                                size: 12,
                                family: "Noto Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#64748B"
                        },
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(45,168,255,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(45,168,255,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(45,168,255,0)'); //blue colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(119,77,211,0.4)');
        gradientStroke2.addColorStop(0.7, 'rgba(119,77,211,0.1)');
        gradientStroke2.addColorStop(0, 'rgba(119,77,211,0)'); //purple colors

        new Chart(ctx2, {
            plugins: [{
                beforeInit(chart) {
                    const originalFit = chart.legend.fit;
                    chart.legend.fit = function fit() {
                        originalFit.bind(chart.legend)();
                        this.height += 40;
                    }
                },
            }],
            type: "line",
            data: {
                labels: ["Aug 18", "Aug 19", "Aug 20", "Aug 21", "Aug 22", "Aug 23", "Aug 24", "Aug 25", "Aug 26",
                    "Aug 27", "Aug 28", "Aug 29", "Aug 30", "Aug 31", "Sept 01", "Sept 02", "Sept 03", "Aug 22",
                    "Sept 04", "Sept 05", "Sept 06", "Sept 07", "Sept 08", "Sept 09"
                ],
                datasets: [{
                    label: "Volume",
                    tension: 0,
                    borderWidth: 2,
                    pointRadius: 3,
                    borderColor: "#2ca8ff",
                    pointBorderColor: '#2ca8ff',
                    pointBackgroundColor: '#2ca8ff',
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: [2828, 1291, 3360, 3223, 1630, 980, 2059, 3092, 1831, 1842, 1902, 1478, 1123,
                        2444, 2636, 2593, 2885, 1764, 898, 1356, 2573, 3382, 2858, 4228
                    ],
                    maxBarThickness: 6

                }, {
                    label: "Trade",
                    tension: 0,
                    borderWidth: 2,
                    pointRadius: 3,
                    borderColor: "#832bf9",
                    pointBorderColor: '#832bf9',
                    pointBackgroundColor: '#832bf9',
                    backgroundColor: gradientStroke2,
                    fill: true,
                    data: [2797, 2182, 1069, 2098, 3309, 3881, 2059, 3239, 6215, 2185, 2115, 5430, 4648,
                        2444, 2161, 3018, 1153, 1068, 2192, 1152, 2129, 1396, 2067, 1215, 712, 2462,
                        1669, 2360, 2787, 861
                    ],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'end',
                        labels: {
                            boxWidth: 6,
                            boxHeight: 6,
                            padding: 20,
                            pointStyle: 'circle',
                            borderRadius: 50,
                            usePointStyle: true,
                            font: {
                                weight: 400,
                            },
                        },
                    },
                    tooltip: {
                        backgroundColor: '#fff',
                        titleColor: '#1e293b',
                        bodyColor: '#1e293b',
                        borderColor: '#e9ecef',
                        borderWidth: 1,
                        pointRadius: 2,
                        usePointStyle: true,
                        boxWidth: 8,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4]
                        },
                        ticks: {
                            callback: function(value, index, ticks) {
                                return parseInt(value).toLocaleString() + ' EUR';
                            },
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 12,
                                family: "Noto Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#64748B"
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [4, 4]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 12,
                                family: "Noto Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#64748B"
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/assets/js/corporate-ui-dashboard.min.js?v=1.0.0') }}"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

</body>

</html>
