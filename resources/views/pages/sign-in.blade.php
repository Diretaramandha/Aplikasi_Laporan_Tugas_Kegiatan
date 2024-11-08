<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        // Menyimpan data ke Local Storage saat input berubah
        function saveToLocalStorage() {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            localStorage.setItem('email', email);
            localStorage.setItem('password', password);
        }

        // Memuat data dari Local Storage saat halaman dimuat
        window.onload = function() {
            document.getElementById('email').value = localStorage.getItem('email') || '';
            document.getElementById('password').value = localStorage.getItem('password') || '';
        };
    </script>
</head>

<body>
    <div class="d-flex justify-content-center flex-wrap align-items-center"
        style="height: 100vh;background: linear-gradient(127deg, rgba(172,79,255,1) 0%, rgba(136,0,255,1) 26%, rgba(127,37,255,1) 42%, rgba(80,95,255,1) 83%, rgba(79,174,255,1) 100%);">
        <div class="container">
            <div class="row w-100 bg-dark" style="height: 61vh">
                <div class="col-lg-5 col-md-12">
                    <img src="{{ asset('img/event.jpg') }}" alt=""
                        style="width: 100%; height: 37.8rem; object-fit: cover;margin: 0 12px 0 -12px; opacity: 0.6;">
                </div>
                <div class="col-lg-7 p-5 col-md-12 align-self-center">
                    <form action="/auth" method="post" onsubmit="localStorage.removeItem('password');">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mb-5 text-white text-center">
                                <h1 class="fw-bold">SIGN IN</h1>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <label for="" class="d-flex text-white fw-bold">Email <p
                                        class="text-danger ms-2">*</p>
                                </label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Enter Email" value="{{ old('email') }}" oninput="saveToLocalStorage()">
                            </div>
                            <div class="col-lg-12 mb-5">
                                <label for="" class="d-flex text-white fw-bold">Password <p
                                        class="text-danger ms-2">*</p>
                                </label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter Password" oninput="saveToLocalStorage()">
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn border-0 text-white w-100 fw-bold py-2"
                                    style="background-color:darkorchid ">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
