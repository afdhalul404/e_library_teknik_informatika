@extends('admin.templates.dashboard')
@section('content')
    <div class="card bg-white rounded shadow-sm p-2 mt-3">
        <h5 class="text-center">Daftar Dosen</h5>
        <div class="d-flex justify-content-between align-items-center col-12">
            <div class="d-flex col-11 gap-1">

                <div class="card border-0 rounded-0 bg-body shadow-sm rounded col-3 px-1">
                    <form action="/admin/dosen/search" method="get">
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
            <table class="table pb-3" id="myTable">
                <thead>
                    <tr class="table-info">
                        <th class="col-1 text-center">#</th>
                        <th class="col-2 text-center">NIP</th>
                        <th class="text-center">Nama Dosen</th>
                        <th class="col-1 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosen as $item)
                        <tr>
                            <td class="col-1 text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->nip }}</td>
                            <td>{{ $item->nama_dosen }}</td>
                            <td>
                                <a href="#" style="text-decoration: none"
                                    class="badge rounded-pill bg-warning p-2 edit" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop1{{ $item->nip }}" name="btn-edit"><i
                                        class="ri-pencil-line"></i></a>
                                <a href="#" style="text-decoration: none"
                                    class="badge rounded-pill bg-danger p-2 edit" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop2{{ $item->nip }}"><i
                                        class="ri-delete-bin-6-line"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <div class="px-3 pt-4">
                {{ $dosen->links() }}
            </div>
        </div>
    </div>



    {{-- start: add modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <form action="/admin/dosen" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="kota">NIP<span class="text-danger fw-bolder">*</span></label>
                        <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" required
                            value="{{ old('nip') }}">
                        @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama">Nama Dosen<span class="text-danger fw-bolder">*</span></label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" required
                            value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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

    @foreach ($dosen as $data)
        {{-- start: edit modal --}}
        <div class="text-start">
            <div class="modal fade" id="staticBackdrop1{{ $data->nip }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form action="/admin/dosen/update/{{ $data->nip }}" method="POST">
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
                                    <label for="kode">NIP<span class="text-danger fw-bolder">*</span></label>
                                    <input type="text" name="nip" class="form-control"
                                        value="{{ $data->nip }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama">Nama Dosen<span class="text-danger fw-bolder">*</span></label>
                                    <input type="text" name="nama" class="form-control" required
                                        value="{{ $data->nama_dosen }}">
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
        <div class="modal fade" id="staticBackdrop2{{ $data->nip }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="/admin/dosen/delete/{{ $data->nip }}" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="_method" value="DELETE">
                            <h6 class="text-center pt-3 pb-3">Yakin ingin menghapus dosen, dengan NIP
                                {{ $data->nip }}</h6>

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
