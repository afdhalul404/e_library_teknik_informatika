<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Library | Teknik Informatika</title>

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <link rel="icon" href="{{ asset('img/logo-uho.png') }}" type="image/png">


</head>

<body>
    {{-- start: Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark static-top fixed-top" style="background-color: #003487;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="Teknik Informatika UHO" width="130px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link d-flex align-items-center" aria-current="page" href="#">
                                <span>Koleksi Pustaka</span>
                                <i class="ri-arrow-down-s-line ms-2" style="font-size: 1rem;"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/buku">Buku</a>
                                <a class="dropdown-item" href="/kp">Laporan KP</a>
                                <a class="dropdown-item" href="/skripsi">Skripsi</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#tentangKami">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#kontak">Kontak</a>
                    </li>
                </ul>

            </div>
            <div class="collapse navbar-collapse user" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto d-flex flex-row align-items-center justify-content-center gap-4 gap-md-2 pb-3 pb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Daftar</a>
                    </li>
                    <li class="strip mx-2"></li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- end: Navbar --}}

    <main>
        {{-- start: card-search --}}
        <div style="padding-top: 100px; margin-bottom: 180px">
            <div class="container">
                <div class="card border-0 rounded-0 shadow-lg mb-5 bg-body rounded"
                    style="background-color: #f0f0f0; box-shadow: 5px 5px 10px #d9d9d9, -5px -5px 10px #ffffff;">

                    <div class="card-body justify-content-between flex-column flex-md-row col-12" style="z-index: 2">
                        <!-- View: search.blade.php -->
                        <form action="/search" method="get" class="d-flex flex-column flex-md-row gap-md-5 col-12">
                            {{-- @csrf --}}
                            <div class="select-box position-relative col-md-3">
                                <div class="options-container position-absolute col-12">
                                    <div class="option">
                                        <input type="radio" class="radio" id="buku" name="category"
                                            value="buku" />
                                        <label for="buku">Buku</label>
                                    </div>

                                    <div class="option">
                                        <input type="radio" class="radio" id="kp" name="category"
                                            value="kp" />
                                        <label for="kp">Laporan Kp</label>
                                    </div>

                                    <div class="option">
                                        <input type="radio" class="radio" id="skripsi" name="category"
                                            value="skripsi" />
                                        <label for="skripsi">Skripsi</label>
                                    </div>
                                </div>

                                <div class="selected d-flex justify-content-between align-items-center col-12">
                                    <span>Pilih</span>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </div>
                            <div class="search d-flex align-items-center col-md-8 border-start ">
                                <i class="ri-search-2-line"></i>
                                <input type="search" id="form1" class="form-input border-0" name="search"
                                    placeholder="Masukan Kata Kunci" />
                            </div>
                            <button type="submit" class="d-none"></button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end : card-search --}}
            <div style="z-index: 1; margin-bottom: 150px">
                @yield('content')
            </div>
        </div>
    </main>

    {{-- start : footer --}}
    <footer class="text-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <img src="{{ asset('img/logo-admin.png') }}" alt="Teknik Informatika UHO" width="130px">
                    <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque placerat
                        vel
                        lectus sed vestibulum. Donec malesuada, neque vel pulvinar vehicula, arcu felis congue sapien,
                        id tincidunt ex ipsum vel risus. </p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Link Terkait</h5>
                    <ul class="list-unstyled">
                        <li><a href="https://uho.ac.id/">Universitas Halu Oleo</a></li>
                        <li><a href="https://ti.eng.uho.ac.id/web">Teknik Informatika Universitas Haluoleo</a></li>
                        <li><a href="https://e-library.uho.ac.id/">Perpustakaan Digital UHO</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled">
                        <li><i class="ri-phone-line"></i> (0401) 3193464</li>
                        <li><i class="ri-mail-line"></i> tif@uho.ac.id</li>
                        <li><i class="ri-map-pin-line"></i> Jl. HEA Mokodompit No. 1, Kendari, Sulawesi Tenggara</li>
                    </ul>
                </div>
            </div>
            <div class="row mt-5 copyright">
                <div class="col-md-12 text-center">
                    <p>&copy; 2023 e-Library Teknik Informatika UHO. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>


    {{-- end : footer --}}


    {{-- bootstrap --}}
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
