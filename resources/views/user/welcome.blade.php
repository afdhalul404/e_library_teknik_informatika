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

    <main style="margin-top: 100px">
        <div class="welcome-page">
            <div class="container d-flex align-items-center">
                <div class="col-12 col-md-6 teks">
                    <h2>
                        Selamat Datang di Perpustakaan Digital<br> Jurusan Teknik Informatika <br>Universitas
                        Haluoleo
                    </h2>
                    <p>Dapatkan akses mudah ke koleksi digital, yang mencakup buku, <br>tugas akhir, dan laporan
                        kerja
                        praktek terbaru dalam <br>bidang jurusan Teknik Informatika</p>
                    <div class="card mt-5"
                        style="
                            background: rgba( 255, 255, 255, 0.1 );
                            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
                            backdrop-filter: blur( 11px );
                            -webkit-backdrop-filter: blur( 11px );
                            border-radius: 10px;
                            border: 1px solid rgba( 255, 255, 255, 0.18 );">
                        <div class="card-body row text-center">
                            <div class="col-4 ">
                                <h6 style="color: #FE8E45">Buku</h6>
                                <h4 class="fw-bolder counter">{{ $buku->count() }}</h4>
                            </div>
                            <div class="col-4 border-end border-start">
                                <h6 style="color: #FE8E45">Laporan</h6>
                                <h4 class="fw-bolder counter">{{ $kp->count() }}</h4>
                            </div>
                            <div class="col-4">
                                <h6 style="color: #FE8E45">Skripsi</h6>
                                <h4 class="fw-bolder counter">{{ $skripsi->count() }}</h4>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <img src="img/welcome1.png" alt="" class="d-none d-md-block img-fluid " width="500px">
                </div>
            </div>
        </div>

        <div class="search-welcome">
            <div class="container">
                <div class="card border-0 rounded-0 shadow-lg mb-5 bg-body rounded"
                    style="background-color: #f0f0f0; box-shadow: 5px 5px 10px #d9d9d9, -5px -5px 10px #ffffff;">

                    <div class="card-body justify-content-between flex-column flex-md-row col-12">
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
        </div>

        <div class="pt-5 " id="tentangKami">
            <div class="container">
                <h3 class="text-center fw-bolder">Sambutan Ketua Jurusan Teknik Informatika</h3>
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-5 mt-md-5 mb-md-5">
                    <div class="order-md-first col-md-8 col-12">
                        <img class="d-none d-md-block" src="{{ asset('img/quetos.png') }}" alt="" width="100px">
                        <h4 class="fw-bolder">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium impedit alias quam, repellendus ullam similique culpa voluptates recusandae rem. Adipisci fuga dolores amet ad quisquam accusantium, doloremque corporis minima id odit laudantium aut maiores eligendi eveniet magnam animi optio reprehenderit quam voluptates quod. Debitis, fugiat?</h4>
                        <h6 class="fw-bolder">Isnawaty, S.Si., MT.</h6>
                        <h6 class="text-secondary">Ketua Jurusan Teknik Informatika</h6>
                    </div>
                    <div class="order-first mb-5 mb-md-0"><img src="{{ asset('img/sambutan-kajur.png') }}" alt="" width="300px"></div>
                </div>
            </div>

        </div>
        <div id="faq" class="pt-5" style="height: 110vh; background-color: #003487">
            <div class="container">
                <h3 class="text-center text-white fw-bolder mb-5">FAQ</h3>
                <div class="d-flex flex-column gap-4">

                    <div class="wrapper bg-white rounded shadow-md">
                        <div class="accordion accordion-flush border-top border-start border-end" id="myAccordion1">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed border-0 fw-bolder" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Lorem ipsum dolor sit amet?
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingOne"
                                    data-bs-parent="#myAccordion1">
                                    <div class="accordion-body p-4">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis quia nam veniam autem illum
                                            similique quam nostrum aut sint eos repudiandae nesciunt, vel quaerat ex?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="wrapper bg-white rounded shadow">
                        <div class="accordion accordion-flush border-top border-start border-end" id="myAccordion2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed border-0 fw-bolder" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro delectus quae commodi?
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingTwo"
                                    data-bs-parent="#myAccordion2">
                                    <div class="accordion-body p-4">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis quia nam veniam autem illum
                                            similique quam nostrum aut sint eos repudiandae nesciunt, vel quaerat ex?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="wrapper bg-white rounded shadow">
                        <div class="accordion accordion-flush border-top border-start border-end" id="myAccordion3">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed border-0 fw-bolder" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit?
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse border-0"
                                    aria-labelledby="flush-headingThree" data-bs-parent="#myAccordion3">
                                    <div class="accordion-body p-4">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis quia nam veniam autem illum
                                            similique quam nostrum aut sint eos repudiandae nesciunt, vel quaerat ex?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wrapper bg-white rounded shadow">
                        <div class="accordion accordion-flush border-top border-start border-end" id="myAccordion4">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFour">
                                    <button class="accordion-button collapsed border-0 fw-bolder" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente quisquam voluptates alias odit eveniet?
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse border-0"
                                    aria-labelledby="flush-headingFour" data-bs-parent="#myAccordion4">
                                    <div class="accordion-body p-4">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis quia nam veniam autem illum
                                            similique quam nostrum aut sint eos repudiandae nesciunt, vel quaerat ex?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="wrapper bg-white rounded shadow">
                        <div class="accordion accordion-flush border-top border-start border-end" id="myAccordion5">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFive">
                                    <button class="accordion-button collapsed border-0 fw-bolder" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                       Lorem ipsum dolor sit amet, consectetur adipisicing.
                                    </button>
                                </h2>
                                <div id="flush-collapseFive" class="accordion-collapse collapse border-0"
                                    aria-labelledby="flush-headingFive" data-bs-parent="#myAccordion5">
                                    <div class="accordion-body p-4">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis quia nam veniam autem illum
                                            similique quam nostrum aut sint eos repudiandae nesciunt, vel quaerat ex?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="wrapper bg-white rounded shadow">
                        <div class="accordion accordion-flush border-top border-start border-end" id="myAccordion6">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingSix">
                                    <button class="accordion-button collapsed border-0 fw-bolder" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, eum?
                                    </button>
                                </h2>
                                <div id="flush-collapseSix" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingSix"
                                    data-bs-parent="#myAccordion6">
                                    <div class="accordion-body p-4">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis quia nam veniam autem illum
                                            similique quam nostrum aut sint eos repudiandae nesciunt, vel quaerat ex?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="contact pt-5 pb-5 vh-md-100" id="kontak" style="background-color: #fff">
            <div class="container">
                <h3 class="text-center fw-bolder">Kontak</h3>
                <div class="pt-4 d-flex flex-column flex-md-row gap-md-5 gap-4 justify-content-center align-items-center">
                    <div class=" d-flex flex-column gap-3 col-md-3 col-12">
                        <div class="card px-4 py-2">
                            <div class=""></div>
                            <div class="">
                                <h6>Lorem ipsum</h6>
                                <p>xxxx xxx xxxx</p>
                            </div>
                        </div>
                        <div class="card px-4 py-2">
                            <div class=""></div>
                            <div class="">
                                <h6>Lorem ipsum</h6>
                                <p>xxxx xxx xxxx</p>
                            </div>
                        </div>
                        <div class="card px-4 py-2">
                            <div class=""></div>
                            <div class="">
                                <h6>Lorem ipsum</h6>
                                <p>xxxx xxx xxxx</p>
                            </div>
                        </div>
                        <div class="card px-4 py-2">
                            <div class=""></div>
                            <div class="">
                                <h6>Lorem ipsum</h6>
                                <p>xxxx xxx xxxx</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-12">
                        <div class="card" style="background: hsla(0, 0%, 100%, 0.956)">
                            <div class="card-body p-3 shadow-5">
                                <div class="pt-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, corrupti tempore. Optiorecusandae.</p>
                                </div>
                                <form action="" class="pt-3">
                                    <div class="d-flex gap-2 mb-3">
                                        <input type="text" name="" id="" class="form-control rounded" placeholder="Nama anda">
                                        <input type="text" name="" id="" class="form-control" placeholder="No handphone">
                                    </div>
                                    <div class="d-flex gap-2 mb-3">
                                        <input type="text" name="" id="" class="form-control" placeholder="Alamat email">
                                        <input type="text" name="" id="" class="form-control" placeholder="Subjek">
                                    </div>
                                    <div class="">
                                        <label for="" class="fw-bolder pb-2">Pesan</label>
                                        <textarea name="" id="" cols="10" rows="5" class="form-control"></textarea>
                                    </div>
                                    <button class="btn btn-primary col-12 mt-4 mb-3" type="submit"
                                        style="background: #FE8E45; border: none">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="" style="height: 70vh; background-color: #003487;">
            <div class="container pt-5 d-flex flex-column align-items-center" style="height: 100%">
                <h3 class="text-white text-center">Lokasi</h3>
                {{-- <div class="mt-4" style="background-color: #b8b7b7; width: 50%; height: 70%; border-radius: 10px">

                </div> --}}

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

    {{-- animate counter --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.counter').counterUp({
                delay: 50,
                time: 1000
            });
        });
    </script>

    {{-- google maps api --}}
</body>




</html>
