@extends('admin.templates.dashboard')
@section('content')
    <div class="card bg-white rounded shadow-sm p-2 mt-3">
        <h5 class="text-center">Daftar Laporan KP</h5>

        <div class="d-flex justify-content-between align-items-center col-12">
            <div class="d-flex col-11 gap-1">
                
                <div class="card border-0 rounded-0 bg-body shadow-sm rounded col-3 px-1">
                    <form action="/admin/kerja_praktek/search" method="get">
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
                        <th class="col-1">#</th>
                        <th class="col-1">Kode</th>
                        <th class="col-3">Judul</th>
                        <th class="col-2">Tim KP</th>
                        <th class="col-2">Tempat</th>
                        <th class="col-1">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($kp as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_doc }}</td>
                            <td>{{ $item->judul_kp }}</td>
                            <td class="d-flex justify-content-center">
                                <table class="table table-borderless">

                                    @if ($item->mahasiswa1 != null)
                                        <tr class=" ">
                                            <td class="">
                                                <p>{{ $item->nim1 }}</p>
                                            </td>
                                            <td class="">
                                                <p>{{ $item->mahasiswa1 }}</p>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($item->mahasiswa2 != null)
                                        <tr>
                                            <td>
                                                <p>{{ $item->nim2 }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $item->mahasiswa2 }}</p>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($item->mahasiswa3 != null)
                                        <tr>
                                            <td>
                                                <p>{{ $item->nim3 }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $item->mahasiswa3 }}</p>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($item->mahasiswa4 != null)
                                        <tr>
                                            <td>
                                                <p>{{ $item->nim4 }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $item->mahasiswa4 }}</p>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($item->mahasiswa5 != null)
                                        <tr>
                                            <td>
                                                <p>{{ $item->nim5 }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $item->mahasiswa5 }}</p>
                                            </td>
                                        </tr>
                                    @endif
                                </table>

                            </td>
                            <td>{{ $item->tempat_kp }}</td>
                            <td>
                                <a href="/admin/kerja_praktek/detail_{{ $item->kode_doc }}" style="text-decoration: none"
                                    class="badge rounded-pill bg-primary p-2 "><i class="ri-draft-line"></i></a>
                                <a href="#" style="text-decoration: none"
                                    class="badge rounded-pill bg-warning p-2 edit" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop1{{ $item->kode_doc }}" name="btn-edit"><i
                                        class="ri-pencil-line"></i></a>
                                <a href="#" style="text-decoration: none"
                                    class="badge rounded-pill bg-danger p-2 edit" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop2{{ $item->kode_doc }}"><i
                                        class="ri-delete-bin-6-line"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-3 pt-4">
                {{ $kp->links() }}
            </div>

        </div>
    </div>
    {{-- start: add modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <form action="/admin/kerja_praktek" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="kode">Kode Dokumen</label>
                            <input type="text" name="kode" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                        <label for="">Tim KP</label>
                        <div class="card mb-3" style="padding: 20px 30px 10px 20px">

                            <div class="d-flex justify-content-between" style="gap: 10px">
                                <div class="mb-3 col-4">
                                    <label for="nim1">Nim 1</label>
                                    <input type="text" name="nim1" class="form-control" required>
                                </div>
                                <div class="mb-3 col-8">
                                    <label for="mahasiswa1">Mahasiswa 1</label>
                                    <input type="text" name="mahasiswa1" class="form-control" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between" style="gap: 10px">
                                <div class="mb-3 col-4">
                                    <label for="nim2">Nim 2</label>
                                    <input type="text" name="nim2" class="form-control" required>
                                </div>
                                <div class="mb-3 col-8">
                                    <label for="mahasiswa1">Mahasiswa 2</label>
                                    <input type="text" name="mahasiswa2" class="form-control">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between" style="gap: 10px">
                                <div class="mb-3 col-4">
                                    <label for="nim3">Nim 3</label>
                                    <input type="text" name="nim3" class="form-control">
                                </div>
                                <div class="mb-3 col-8">
                                    <label for="mahasiswa3">Mahasiswa 3</label>
                                    <input type="text" name="mahasiswa3" class="form-control">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between" style="gap: 10px">
                                <div class="mb-3 col-4">
                                    <label for="nim1">Nim 4</label>
                                    <input type="text" name="nim4" class="form-control">
                                </div>
                                <div class="mb-3 col-8">
                                    <label for="mahasiswa4">Mahasiswa 4</label>
                                    <input type="text" name="mahasiswa4" class="form-control">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between" style="gap: 10px">
                                <div class="mb-3 col-4">
                                    <label for="nim1">Nim 5</label>
                                    <input type="text" name="nim5" class="form-control">
                                </div>
                                <div class="mb-3 col-8">
                                    <label for="mahasiswa5">Mahasiswa 5</label>
                                    <input type="text" name="mahasiswa5" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="pembimbing_jurusan">Pembimbing Jurusan</label>
                            <select name="pembimbing_jurusan" id="" class="form-control">
                                <option value=""></option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->nip }}">{{ $item->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pembimbing_lapangan">Pembimbing Lapangan</label>
                            <select name="pembimbing_lapangan" id="" class="form-control">
                                <option value=""></option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->nip }}">{{ $item->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tempat">Tempat KP</label>
                            <input type="text" name="tempat" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="cover">Cover</label>
                            <input type="file" name="cover" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="abstrak">Abstrak PDF</label>
                            <input type="file" name="abstrak" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tahun">Tahun</label>
                            <input type="text" name="tahun" class="form-control">
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

    @foreach ($kp as $data)
        {{-- start: edit modal --}}
        <div class="text-start">
            <div class="modal fade" id="staticBackdrop1{{ $data->kode_doc }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form action="/admin/kerja_praktek/update/{{ $data->kode_doc }}" method="POST"
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
                                    <label for="kode">Kode Dokumen</label>
                                    <input type="text" name="kode" class="form-control" required
                                        value="{{ $data->kode_doc }}">
                                </div>
                                <div class="mb-3">
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" class="form-control" required
                                        value="{{ $data->judul_kp }}">
                                </div>
                                <label for="">Tim KP</label>
                                <div class="card mb-3" style="padding: 20px 30px 10px 20px">

                                    <div class="d-flex justify-content-between" style="gap: 10px">
                                        <div class="mb-3 col-4">
                                            <label for="nim1">Nim 1</label>
                                            <input type="text" name="nim1" class="form-control" required
                                                value="{{ $data->nim1 }}">
                                        </div>
                                        <div class="mb-3 col-8">
                                            <label for="mahasiswa1">Mahasiswa 1</label>
                                            <input type="text" name="mahasiswa1" class="form-control" required
                                                value="{{ $data->mahasiswa1 }}">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between" style="gap: 10px">
                                        <div class="mb-3 col-4">
                                            <label for="nim2">Nim 2</label>
                                            <input type="text" name="nim2" class="form-control" required
                                                value="{{ $data->nim2 }}">
                                        </div>
                                        <div class="mb-3 col-8">
                                            <label for="mahasiswa1">Mahasiswa 2</label>
                                            <input type="text" name="mahasiswa2" class="form-control"
                                                value="{{ $data->mahasiswa2 }}">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between" style="gap: 10px">
                                        <div class="mb-3 col-4">
                                            <label for="nim3">Nim 3</label>
                                            <input type="text" name="nim3" class="form-control"
                                                value="{{ $data->nim3 }}">
                                        </div>
                                        <div class="mb-3 col-8">
                                            <label for="mahasiswa3">Mahasiswa 3</label>
                                            <input type="text" name="mahasiswa3" class="form-control"
                                                value="{{ $data->mahasiswa3 }}">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between" style="gap: 10px">
                                        <div class="mb-3 col-4">
                                            <label for="nim1">Nim 4</label>
                                            <input type="text" name="nim4" class="form-control"
                                                value="{{ $data->nim4 }}">
                                        </div>
                                        <div class="mb-3 col-8">
                                            <label for="mahasiswa4">Mahasiswa 4</label>
                                            <input type="text" name="mahasiswa4" class="form-control"
                                                value="{{ $data->mahasiswa4 }}">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between" style="gap: 10px">
                                        <div class="mb-3 col-4">
                                            <label for="nim1">Nim 5</label>
                                            <input type="text" name="nim5" class="form-control"
                                                value="{{ $data->nim5 }}">
                                        </div>
                                        <div class="mb-3 col-8">
                                            <label for="mahasiswa5">Mahasiswa 5</label>
                                            <input type="text" name="mahasiswa5" class="form-control"
                                                value="{{ $data->mahasiswa5 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="pembimbing_jurusan">Pembimbing Jurusan</label>
                                    <select name="pembimbing_jurusan" id="" class="form-control">
                                        <option value=""></option>
                                        @foreach ($dosen as $item)
                                            <option value="{{ $item->nip }}"
                                                {{ $data->pembimbing_jurusan == $item->nip ? 'selected' : '' }}>
                                                {{ $item->nama_dosen }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pembimbing_lapangan">Pembimbing Lapangan</label>
                                    <select name="pembimbing_lapangan" id="" class="form-control">
                                        <option value=""></option>
                                        @foreach ($dosen as $item)
                                            <option value="{{ $item->nip }}"
                                                {{ $data->pembimbing_lapangan == $item->nip ? 'selected' : '' }}>
                                                {{ $item->nama_dosen }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat">Tempat KP</label>
                                    <input type="text" name="tempat" class="form-control" required
                                        value="{{ $data->tempat_kp }}">
                                </div>
                                <div class="mb-3">
                                    <label for="kp_cover">Cover</label>
                                    <input type="file" name="kp_cover" class="form-control"
                                        value="{{ $data->fileKp->cover }}">
                                </div>
                                @if ($data->fileKp->cover)
                                    <div class="mb-3">
                                        <img style="max-width: 50px"
                                            src="{{ url('kp_cover') . '/' . $data->fileKp->cover }}" alt="">
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="kp_abstrak">Abstrak PDF</label>
                                    <input type="file" name="kp_abstrak" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="tahunFF">Tahun</label>
                                    <input type="text" name="tahun" class="form-control"
                                        value="{{ $data->fileKp->tahun }}">
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
        <div class="modal fade" id="staticBackdrop2{{ $data->kode_doc }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="/admin/kerja_praktek/delete/{{ $data->kode_doc }}" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="_method" value="DELETE">
                            <h6 class="text-center pt-3 pb-3">Yakin ingin menghapus file KP dengan kode
                                {{ $data->kode_doc }}</h6>

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
@endsection
