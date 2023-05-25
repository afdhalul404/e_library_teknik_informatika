@extends('admin.templates.dashboard')

@section('content')
    <div class="card bg-white rounded shadow-sm p-2 mt-3">
        <h5 class="text-center">Daftar Skripsi</h5>
        <div class="d-flex justify-content-between align-items-center col-12">
            <div class="d-flex col-11 gap-1">

                <div class="card border-0 rounded-0 bg-body shadow-sm rounded col-3 px-1">
                    <form action="/admin/skripsi/search" method="get">
                        <div class="p-1 d-flex justify-content-between">
                            <input type="text" class="form-input border-0 col-10" placeholder="Cari"
                                style="font-size: 14px;" name="keyword"
                                onfocus="this.style.outline='none'; this.style.borderColor='transparent'; this.style.boxShadow='none';" />
                            <div class=" card border-0 rounded-2"
                                style="background-color: #536bf6; width: 35px; height: 35px">
                                <button type="submit" class=""
                                    style="border: none; background-color: transparent; padding: 5px 0;">
                                    <i class="ri-search-2-line" style="color: #fff; margin-top: 10px"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="col-1">
                <a href="" class="btn btn btn-primary btn-sm rounded-pill m-3 d-flex justify-content-center"
                    data-bs-toggle="modal" data-bs-target="#addModal" style="gap: 5px; padding: 6px 20px"><i
                        class="ri-add-box-line"></i>Add</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="text-center table pb-3" id="dataTable">
                <thead>
                    <tr class="table-info">
                        <th class="">#</th>
                        {{-- <th class="">
                            <div class="form-check" style="margin-left: 20px">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            </div>
                        </th> --}}
                        <th class="col-1">Kode</th>
                        <th class="col-1">NIM</th>
                        <th class="col-2">Penulis</th>
                        <th class="col-4">Judul</th>
                        <th class="col-2">Tahun Lulus</th>
                        <th class="col-1">Peminatan</th>
                        <th class="col-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skripsi as $data)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- <td>
                                <div class="form-check" style="margin-left: 20px">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                </div>
                            </td> --}}
                            <td>{{ $data->kode_skripsi }}</td>
                            <td>{{ $data->nim }}</td>
                            <td>{{ $data->nama_penulis }}</td>
                            <td>{{ $data->judul_ta }}</td>
                            <td>{{ $data->tahun_lulus }}</td>
                            <td>{{ $data->peminatan }}</td>
                            <td>
                                <a href="/admin/skripsi/detail_{{ $data->kode_skripsi }}" style="text-decoration: none"
                                    class="badge rounded-pill bg-primary p-2 "><i class="ri-draft-line"></i></a>
                                <a href="#" style="text-decoration: none"
                                    class="badge rounded-pill bg-warning p-2 edit" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop1{{ $data->kode_skripsi }}" name="btn-edit"><i
                                        class="ri-pencil-line"></i></a>
                                <a href="#" style="text-decoration: none"
                                    class="badge rounded-pill bg-danger p-2 edit" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop2{{ $data->kode_skripsi }}"><i
                                        class="ri-delete-bin-6-line"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-3 pt-4">
                {{ $skripsi->links() }}
            </div>
        </div>
    </div>


    {{-- start: add modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <form action="/admin/skripsi" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="kode">Kode Skripsi</label>
                            <input type="text" name="kode" class="form-control" required">
                        </div>
                        <div class="mb-3">
                            <label for="nim">NIM</label>
                            <input type="text" name="nim" class="form-control" required">
                        </div>
                        <div class="mb-3">
                            <label for="nama">Nama Penulis</label>
                            <input type="text" name="nama" class="form-control" required">
                        </div>
                        <div class="mb-3">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" required">
                        </div>
                        <div class="mb-3">
                            <label for="tahun">Tahun Lulus</label>
                            <input type="text" name="tahun" class="form-control" required">
                        </div>
                        <div class="mb-3">
                            <label for="pembimbing1">Dosen Pembimbing 1</label>
                            <select name="pembimbing1" id="" class="form-control">
                                <option value=""></option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->nip }}">{{ $item->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pembimbing2">Dosen Pembimbing 2</label>
                            <select name="pembimbing2" id="" class="form-control">
                                <option value=""></option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->nip }}">{{ $item->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="penguji1">Dosen Penguji 1</label>
                            <select name="penguji1" id="" class="form-control">
                                <option value=""></option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->nip }}">{{ $item->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="penguji2">Dosen Penguji 2</label>
                            <select name="penguji2" id="" class="form-control">
                                <option value=""></option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->nip }}">{{ $item->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="penguji3">Dosen Penguji 3</label>
                            <select name="penguji3" id="" class="form-control">
                                <option value=""></option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->nip }}">{{ $item->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Peminatan">Peminatan</label>
                            <select name="peminatan" id="" class="form-control">
                                <option value=""></option>
                                <option value="RPL">RPL</option>
                                <option value="KCV">KCV</option>
                                <option value="JARINGAN">JARINGAN</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ta_cover">Cover</label>
                            <input type="file" class="form-control" name="ta_cover">
                        </div>
                        <div class="mb-3">
                            <label for="ta_abstrak">File Abstrak</label>
                            <input type="file" class="form-control" name="ta_abstrak">
                        </div>
                        <div class="mb-3">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end: add modal --}}


    @foreach ($skripsi as $data)
        {{-- start: edit modal --}}
        <div class="text-start">
            <div class="modal fade" id="staticBackdrop1{{ $data->kode_skripsi }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form action="/admin/skripsi/update/{{ $data->kode_skripsi }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="kode">Kode Skripsi</label>
                                    <input type="text" name="kode" class="form-control" required
                                        value="{{ $data->kode_skripsi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nim">NIM</label>
                                    <input type="text" name="nim" class="form-control" required
                                        value="{{ $data->nim }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama">Nama Penulis</label>
                                    <input type="text" name="nama" class="form-control" required
                                        value="{{ $data->nama_penulis }}">
                                </div>
                                <div class="mb-3">
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" class="form-control" required
                                        value="{{ $data->judul_ta }}">
                                </div>
                                <div class="mb-3">
                                    <label for="tahun">Tahun Lulus</label>
                                    <input type="text" name="tahun" class="form-control" required
                                        value="{{ $data->tahun_lulus }}">
                                </div>
                                <div class="mb-3">
                                    <label for="pembimbing1">Dosen Pembimbing 1</label>
                                    <select name="pembimbing1" id="" class="form-control">
                                        <option value=""></option>
                                        @foreach ($dosen as $item)
                                            <option value="{{ $item->nip }}"
                                                {{ $data->pembimbing1 == $item->nip ? 'selected' : '' }}>
                                                {{ $item->nama_dosen }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pembimbing2">Dosen Pembimbing 2</label>
                                    <select name="pembimbing2" id="" class="form-control">
                                        <option value=""></option>
                                        @foreach ($dosen as $item)
                                            <option value="{{ $item->nip }}"
                                                {{ $data->pembimbing2 == $item->nip ? 'selected' : '' }}>
                                                {{ $item->nama_dosen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="penguji1">Dosen Penguji 1</label>
                                    <select name="penguji1" id="" class="form-control">
                                        @foreach ($dosen as $item)
                                            <option value="{{ $item->nip }}"
                                                {{ $data->penguji1 == $item->nip ? 'selected' : '' }}>
                                                {{ $item->nama_dosen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="penguji2">Dosen Penguji 2</label>
                                    <select name="penguji2" id="" class="form-control">
                                        @foreach ($dosen as $item)
                                            <option value="{{ $item->nip }}"
                                                {{ $data->penguji2 == $item->nip ? 'selected' : '' }}>
                                                {{ $item->nama_dosen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="penguji3">Dosen Penguji 3</label>
                                    <select name="penguji3" id="" class="form-control">
                                        @foreach ($dosen as $item)
                                            <option value="{{ $item->nip }}"
                                                {{ $data->penguji3 == $item->nip ? 'selected' : '' }}>
                                                {{ $item->nama_dosen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="Peminatan">Peminatan</label>
                                    <select name="peminatan" id="" class="form-control">
                                        <option value=""></option>
                                        <option value="RPL" {{ $data->peminatan == 'RPL' ? 'selected' : '' }}>RPL
                                        </option>
                                        <option value="KCV" {{ $data->peminatan == 'KCV' ? 'selected' : '' }}>KCV
                                        </option>
                                        <option value="JARINGAN" {{ $data->peminatan == 'JARINGAN' ? 'selected' : '' }}>
                                            JARINGAN</option>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="ta_cover">Cover</label>
                                    <input type="file" class="form-control" name="ta_cover"
                                        value="{{ $data->cover }}">
                                </div>
                                @if ($data->fileSkripsi->ta_cover)
                                    <div class="mb-3">
                                        <img style="max-width: 50px"
                                            src="{{ url('ta_cover') . '/' . $data->fileSkripsi->ta_cover }}"
                                            alt="">
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="ta_abstrak">File Abstrak</label>
                                    <input type="file" class="form-control" name="ta_abstrak">
                                </div>
                                <div class="mb-3">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" class="form-control" name="lokasi"
                                        value="{{ $data->fileSkripsi->lokasi }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end: edit modal --}}
        {{-- start: delete modal --}}
        <div class="modal fade" id="staticBackdrop2{{ $data->kode_skripsi }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="/admin/skripsi/delete/{{ $data->kode_skripsi }}" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="_method" value="DELETE">
                            <h6 class="text-center pt-3 pb-3">Yakin ingin menghapus Skripsi dengan kode
                                {{ $data->kode_skripsi }}</h6>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- end: delete modal --}}
    @endforeach


    <script></script>
@endsection
