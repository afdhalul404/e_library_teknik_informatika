@extends('admin.templates.dashboard')
@section('content')
    <div class="card bg-white rounded shadow-sm p-5 mt-3">
        <h2>{{ $kp->judul_kp }}</h2>

        <div class="d-flex mt-3">
            <div class="">
                @if ($kp->fileKp->cover === null)
                    <img src="{{ asset('img/cover2.png') }}" alt="" width="300px" style="padding-left: 20px">
                @else
                    <img src="{{ asset('/kp_cover/' . $kp->fileKp->cover) }}" alt="" width="300px"
                        style="padding-left: 20px">
                @endif
            </div>
            <div class="" style="margin-left: 100px">
                <table class="table table-borderless">
                    <tr>
                        <td>Kode Dokumen</td>
                        <td>:</td>
                        <td>{{ $kp->kode_doc }}</td>
                    </tr>
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td>{{ $kp->fileKp->tahun }}</td>
                    </tr>
                    <tr @if ($kp->mahasiswa1 == null) class="d-none" @endif>
                        <td>Mahasiswa 1</td>
                        <td>:</td>
                        <td>{{ $kp->mahasiswa1 }} ({{ $kp->nim1 }})</td>
                    </tr>
                    <tr @if ($kp->mahasiswa2 == null) class="d-none" @endif>
                        <td>Mahasiswa 2</td>
                        <td>:</td>
                        <td>{{ $kp->mahasiswa2 }} ({{ $kp->nim2 }})</td>
                    </tr>
                    <tr @if ($kp->mahasiswa3 == null) class="d-none" @endif>
                        <td>Mahasiswa 3</td>
                        <td>:</td>
                        <td>{{ $kp->mahasiswa3 }} ({{ $kp->nim3 }})</td>
                    </tr>
                    <tr @if ($kp->mahasiswa4 == null) class="d-none" @endif>
                        <td>Mahasiswa 4</td>
                        <td>:</td>
                        <td>{{ $kp->mahasiswa4 }} ({{ $kp->nim4 }})</td>
                    </tr>
                    <tr @if ($kp->mahasiswa5 == null) class="d-none" @endif>
                        <td>Mahasiswa 5</td>
                        <td>:</td>
                        <td>{{ $kp->mahasiswa5 }} ({{ $kp->nim5 }})</td>
                    </tr>
                    <tr>
                        <td>Pembimbing Jurusan</td>
                        <td>:</td>
                        <td>{{ $kp->pembimbingJurusan->nama_dosen }}</td>
                    </tr>
                    <tr>
                        <td>Pembimbng Lapangan</td>
                        <td>:</td>
                        <td>{{ $kp->pembimbingLapangan->nama_dosen }}</td>
                    </tr>
                    <tr>
                        <td>Tempat KP</td>
                        <td>:</td>
                        <td>{{ $kp->tempat_kp }}</td>
                    </tr>
                    <tr>
                        <td>Abstrak</td>
                        <td>:</td>
                        <td>
                            @if ($kp->fileKp->file_abstrak === null)
                                <p class="text-secondary">-</p>
                            @else
                                <a href="/kp_abstrak/{{ $kp->fileKp->file_abstrak }}">Lihat File Abstrak</a>
                            @endif
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
@endsection
