<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Library</title>

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="icon" href="{{ asset('img/logo-uho.png') }}" type="image/png">


</head>

<body>

    <main style="">
        <div class="container-fluid">
            <div class="row" style="height: 100%;">
                <div class="d-none d-md-flex col-5 position-fixed align-items-center justify-content-center"
                    style="background-color: #003487; height: 100vh;">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                </div>
                <div class="col-12 col-md-5 offset-md-5">
                    <div class="row pb-2 pt-3 ms-xl-4">
                        <div class="text-primary mb-4">
                            <a href="/" class="text-decoration-none text-reset d-flex align-items-center"
                                style="font-size: 18px">
                                <i class="ri-arrow-left-s-line fw-bolder" style="font-size: 25px"></i>Beranda
                            </a>
                        </div>
                        <h4 class="fw-bolder">Masuk dengan Akun Anda</h4>
                        <h6 class="text-secondary">Hi, Selamat datang di <span class="text-primary">E-library
                                Teknik Informatika</span></h6>
                    </div>
                    <div class="row">
                        <div class="d-flex align-items-center px-md-5">
                            <form class="col-12">
                                <div class="form-outline mt-3">
                                    <label class="form-label" for="form2Example18">Email<span
                                            class="text-danger fw-bolder">*</span></label>
                                    <input type="email" id="form2Example18" class="form-control"
                                        placeholder="Email" />
                                    <p class="note text-secondary fst-italic">Masukkan email yang sudah terdaftar</p>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" id="password" class="form-control"
                                            placeholder="********" />
                                        <span class="input-icon ri-eye-line btn border" id="togglePassword"></span>
                                    </div>
                                </div>


                                <button class="btn col-12 btn-primary" type="button">Masuk</button>
                                <p class="text-center pt-3 pb-3">Belum Punya Akun? <a href="/register"
                                        class="link-info">Daftar</a></p>

                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-2">

                </div>
            </div>
        </div>
    </main>

    <style>
        p.note {
            font-size: 12px
        }
    </style>

    {{-- bootstrap --}}
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.classList.remove('ri-eye-line');
                this.classList.add('ri-eye-off-line');
            } else {
                passwordInput.type = 'password';
                this.classList.remove('ri-eye-off-line');
                this.classList.add('ri-eye-line');
            }
        });
    </script>
</body>




</html>
