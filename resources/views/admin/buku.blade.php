@extends('admin.templates.dashboard')
@section('content')
    <div class="card bg-white rounded shadow-sm p-2 mt-3">
        <h5 class="text-center">Daftar Buku</h5>

        <div class="d-flex justify-content-between align-items-center col-12">
            <div class="d-flex col-11 gap-1">

                <div class="card border-0 rounded-0 bg-body shadow-sm rounded col-3 px-1">
                    <form action="/admin/buku/search" method="get">
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
                        <th class="col-1">Kode</th>
                        <th class="col-4">Judul</th>
                        <th class="col-2">Penulis</th>
                        <th class="col-1">Tahun Terbit</th>
                        <th class="col-1">Stok</th>
                        <th class="col-2">Kategori</th>
                        <th class="col-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_buku }}</td>
                            <td>{{ $item->judul_buku }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->tahun_terbit }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td class="col-1">
                                <a href="/admin/buku/detail_{{ $item->kode_buku }}" style="text-decoration: none"
                                    class="badge rounded-pill bg-primary p-2 "><i class="ri-draft-line"></i></a>
                                <a href="#" style="text-decoration: none"
                                    class="badge rounded-pill bg-warning p-2 edit" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop1{{ $item->id }}" name="btn-edit"><i
                                        class="ri-pencil-line"></i></a>
                                <a href="#" style="text-decoration: none"
                                    class="badge rounded-pill bg-danger p-2 edit" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop2{{ $item->id }}"><i
                                        class="ri-delete-bin-6-line"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-3 pt-4">
                {{ $buku->links() }}
            </div>
        </div>
    </div>


    {{-- start: add modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <form action="/admin/buku" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kode">Kode Buku</label>
                            <input type="text" name="kode" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="judul">Judul Buku</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="penulis">Penulis</label>
                            <input type="text" name="penulis" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="penerbit">penerbit</label>
                            <input type="text" name="penerbit" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun">Tahun Terbit</label>
                            <input type="text" name="tahun" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="stok">Stok</label>
                            <input type="text" name="stok" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="cover">Cover</label>
                            <input type="file" name="cover" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end: add modal --}}

    @foreach ($buku as $data)
        {{-- start: edit modal --}}
        <div class="text-start">
            <div class="modal fade" id="staticBackdrop1{{ $data->id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form action="/admin/buku/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="kode">Kode Buku</label>
                                    <input type="text" name="kode" class="form-control"
                                        value="{{ $data->kode_buku }}">
                                </div>
                                <div class="mb-3">
                                    <label for="judul">Judul Buku</label>
                                    <input type="text" name="judul" class="form-control" required
                                        value="{{ $data->judul_buku }}">
                                </div>
                                <div class="mb-3">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" name="penulis" class="form-control" required
                                        value="{{ $data->penulis }}">
                                </div>
                                <div class="mb-3">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" required
                                        value="{{ $data->penerbit }}">
                                </div>
                                <div class="mb-3">
                                    <label for="tahun">Tahun Terbit</label>
                                    <input type="text" name="tahun" class="form-control" required
                                        value="{{ $data->tahun_terbit }}">
                                </div>
                                <div class="mb-3">
                                    <label for="stok">Stok</label>
                                    <input type="text" name="stok" class="form-control" required
                                        value="{{ $data->stok }}">
                                </div>
                                <div class="mb-3">
                                    <label for="cover">Cover</label>
                                    <input type="file" name="cover" class="form-control"
                                        value="{{ $data->cover }}">
                                </div>
                                @if ($data->cover)
                                    <div class="mb-3">
                                        <img style="max-width: 50px" src="{{ url('buku_cover') . '/' . $data->cover }}"
                                            alt="">
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" name="kategori" class="form-control" required
                                        value="{{ $data->kategori }}">
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
        <div class="modal fade" id="staticBackdrop2{{ $data->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="/admin/buku/delete/{{ $data->id }}" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="_method" value="DELETE">
                            <h6 class="text-center pt-3 pb-3">Yakin ingin menghapus buku, dengan kode
                                {{ $data->kode_buku }}</h6>

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
