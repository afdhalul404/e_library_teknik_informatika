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

    <main>
        <div class="container-fluid">
            <div class="row" style="height: 100%">
                <div class="d-none d-md-flex col-5 position-fixed align-items-center justify-content-center"
                    style="background-color: #003487; height: 100vh;">
                    <img src="{{ asset('img/logo.png') }}" alt="Teknik Informatika UHO">
                </div>

                <div class="col-12 col-md-5 offset-md-5" style="height: 100vh">
                    <div class="row pb-2 pt-3 ms-xl-4">
                        <div class="text-primary mb-4">
                            <a href="/" class="text-decoration-none text-reset d-flex align-items-center"
                                style="font-size: 18px">
                                <i class="ri-arrow-left-s-line fw-bolder" style="font-size: 25px"></i>Beranda
                            </a>
                        </div>
                        <h4 class="fw-bolder">Registrasi Akun Baru</h4>
                        <h6 class="text-secondary">Hi, Silahkan daftar untuk menjadi bagian dari <span
                                class="text-primary">E-library Teknik Informatika</span></h6>
                    </div>
                    <div class="row">
                        <div class="d-flex align-items-center px-md-5">
                            <form class="col-12">
                                <div class="form-outline mt-3">
                                    <label class="form-label" for="form2Example18">Masuk Sebagai<span
                                            class="text-danger fw-bolder">*</span></label>
                                    <select name="" id="" class="form-control">
                                        <option value="" class="">Pilih</option>
                                        <option value="">Dosen</option>
                                        <option value="">Mahasiswa</option>
                                    </select>
                                </div>
                                <div class="form-outline mt-3">
                                    <label class="form-label" for="form2Example18">Nama Lengkap<span
                                            class="text-danger fw-bolder">*</span></label>
                                    <input type="email" id="form2Example18" class="form-control"
                                        placeholder="Nama Lengkap" />
                                </div>
                                <div class="form-outline mt-3">
                                    <label class="form-label" for="form2Example18">Email<span
                                            class="text-danger fw-bolder">*</span></label>
                                    <input type="email" id="form2Example18" class="form-control"
                                        placeholder="Email" />
                                    <p class="note text-secondary fst-italic">Masukkan email yang valid</p>
                                </div>
                                <div class="form-outline mt-3">
                                    <label class="form-label" for="form2Example18">NIM/NIP/NIDN<span
                                            class="text-danger fw-bolder">*</span></label>
                                    <input type="email" id="form2Example18" class="form-control"
                                        placeholder="NIM/NIP/NIDN" />
                                </div>
                                <div class="form-outline mt-3">
                                    <label class="form-label" for="form2Example18">Tahun Masuk<span
                                            class="text-danger fw-bolder">*</span></label>
                                    <input type="email" id="form2Example18" class="form-control"
                                        placeholder="Tahun Masuk" />
                                </div>
                                <div class="d-flex flex-column flex-md-row mt-3 gap-md-1">
                                    <div class="form-outline col-md-6">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group">
                                            <input type="password" id="password" class="form-control"
                                                placeholder="********" />
                                            <span class="input-icon ri-eye-line btn border" id="togglePassword"></span>
                                        </div>
                                        <p class="note text-secondary fst-italic">Minimal 8 Karakter kombinasi huruf
                                            kapital, huruf kecil, angka dan simbol.</p>
                                    </div>
                                    <div class="form-outline col-md-6">
                                        <label class="form-label" for="confirm-password">Konfirmasi Password</label>
                                        <div class="input-group">
                                            <input type="password" id="confirm-password" class="form-control"
                                                placeholder="********" />
                                            <span class="input-icon ri-eye-line btn border"
                                                id="toggleConfirmPassword"></span>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn col-12 btn-primary mt-4 mt-md-0" type="button">Daftar</button>
                                <p class="text-center pt-4 pb-4">Sudah Punya Akun? <a href="/login"
                                        class="link-info">Masuk</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>

        </div>
    </main>

    <style>
        .bg-image-vertical {
            position: relative;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: auto 100%;
        }

        p.note {
            font-size: 12px
        }

        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 100%;
            }
        }
    </style>

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

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            var confirmPasswordInput = document.getElementById('confirm-password');
            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                this.classList.remove('ri-eye-line');
                this.classList.add('ri-eye-off-line');
            } else {
                confirmPasswordInput.type = 'password';
                this.classList.remove('ri-eye-off-line');
                this.classList.add('ri-eye-line');
            }
        });
    </script>

    {{-- bootstrap --}}
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>




</html>
