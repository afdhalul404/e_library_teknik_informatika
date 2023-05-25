<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\FileKp;
use App\Models\Kp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class KpController extends Controller
{
    public function index()
    {
        $kp = Kp::paginate(50);
        $dosen = Dosen::all();


        return view('admin.kp', ['kp' => $kp, 'dosen' => $dosen]);
    }

    public function store(Request $request)
    {

        DB::beginTransaction(); // memulai transaksi

        try {
            $validator = Validator::make($request->all(), [
                'kode' => 'required|regex:/^[A-Za-z0-9]+$/',
            ]);

            if ($validator->fails()) {
                throw new \Exception('Kode tidak valid');
            }

            $kp = new Kp();
            $kp->kode_doc = $request->kode;
            $kp->judul_kp = $request->judul;
            $kp->nim1 = $request->nim1;
            $kp->mahasiswa1 = $request->mahasiswa1;
            $kp->nim2 = $request->nim2;
            $kp->mahasiswa2 = $request->mahasiswa2;
            $kp->nim3 = $request->nim3;
            $kp->mahasiswa3 = $request->mahasiswa3;
            $kp->nim4 = $request->nim4;
            $kp->mahasiswa4 = $request->mahasiswa4;
            $kp->nim5 = $request->nim5;
            $kp->mahasiswa5 = $request->mahasiswa5;
            $kp->pembimbing_jurusan = $request->pembimbing_jurusan;
            $kp->pembimbing_lapangan = $request->pembimbing_lapangan;
            $kp->tempat_kp = $request->tempat;
            $kp->save();

            $file_kp = new FileKp();

            $file_kp->kode_doc = $request->kode;
            // file kp_cover
            if ($request->file('cover')) {
                $extension = $request->file('cover')->getClientOriginalExtension();
                $fileName = $request->kode . '_' . time() . '.' . $extension;
                $file_kp->cover = $fileName; // simpan nama file ke dalam database
                if (!$request->file('cover')->move(public_path('kp_cover'), $fileName)) {
                    throw new \Exception('Gagal menyimpan file cover');
                } // simpan file ke dalam folder storage dengan nama yang sama
            }

            // //file ta_abstrak
            if ($request->file('abstrak')) {
                $extension = $request->file('abstrak')->getClientOriginalExtension();
                $fileName = $request->kode . '_' . time() . '.' . $extension;
                $file_kp->file_abstrak = $fileName;
                if (!$request->file('abstrak')->move(public_path('kp_abstrak'), $fileName)) {
                    throw new \Exception('Gagal menyimpan file abstrak');
                }
            }

            $file_kp->tahun = $request->tahun;
            $file_kp->save();
            DB::commit();

            return redirect('/admin/kerja_praktek');
        } catch (\Exception $e) {
            DB::rollback(); // rollback transaksi jika terjadi kesalahan
            return back()->withInput()->withErrors(['msg' => 'Gagal menyimpan data']);
        }
    }

    public function show($id)
    {
        $kp = Kp::with(['pembimbingJurusan', 'pembimbingLapangan'])->where('kode_doc', $id)->firstOrFail();

        return view('admin.detail_kp', ['kp' => $kp]);
    }

    public function update(Request $request, $id)
    {
        $kp = Kp::where('kode_doc', $id)->first();

        $kp->kode_doc = $request->kode;
        $kp->judul_kp = $request->judul;
        $kp->nim1 = $request->nim1;
        $kp->nim2 = $request->nim2;
        $kp->nim3 = $request->nim3;
        $kp->nim4 = $request->nim4;
        $kp->nim5 = $request->nim5;
        $kp->mahasiswa1 = $request->mahasiswa1;
        $kp->mahasiswa2 = $request->mahasiswa2;
        $kp->mahasiswa3 = $request->mahasiswa3;
        $kp->mahasiswa4 = $request->mahasiswa4;
        $kp->mahasiswa5 = $request->mahasiswa5;
        $kp->pembimbing_jurusan = $request->pembimbing_jurusan;
        $kp->pembimbing_lapangan = $request->pembimbing_lapangan;
        $kp->tempat_kp  = $request->tempat;
        $kp->save();

        $file_kp = FileKp::where('kode_doc', $id)->first();
        // $file_kp->tahun = $request->tahun;

        if ($request->hasFile('kp_cover')) {
            // Hapus file cover lama
            File::delete(public_path('kp_cover') . '/' . $file_kp->cover);

            // Upload file cover baru
            $extension = $request->file('kp_cover')->getClientOriginalExtension();
            $fileName = $request->nama . '_' . time() . '.' . $extension;
            $request->file('kp_cover')->move(public_path('kp_cover'), $fileName);
            $file_kp->cover = $fileName;
        }
        if ($request->hasFile('kp_abstrak')) {
            // Hapus file cover lama
            File::delete(public_path('kp_abstrak') . '/' . $file_kp->file_abstrak);

            // Upload file cover baru
            $extension = $request->file('kp_abstrak')->getClientOriginalExtension();
            $fileName = $request->nama . '_' . time() . '.' . $extension;
            $request->file('kp_abstrak')->move(public_path('kp_abstrak'), $fileName);
            $file_kp->file_abstrak = $fileName;
        }
        $file_kp->tahun = $request->tahun;
        $file_kp->save();

        return redirect('/admin/kerja_praktek');
    }

    public function destroy($id)
    {
        $kp = FileKp::where('kode_doc', $id)->first();

        File::delete(public_path('kp_cover') . '/' . $kp->cover);
        File::delete(public_path('kp_abstrak') . '/' . $kp->file_abstrak);


        Kp::where('kode_doc', $id)->delete();
        return redirect('/admin/kerja_praktek');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $kp = Kp::where('judul_kp', 'LIKE', '%' . $keyword . '%')->paginate(25);
        $dosen = Dosen::all();

        return view('admin.kp', ['kp' => $kp, 'dosen' => $dosen]);
    }
}
