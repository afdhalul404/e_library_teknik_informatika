<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\FileSkripsi;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SkripsiController extends Controller
{
    public function index()
    {
        $skripsi = Skripsi::paginate(50);
        $dosen = Dosen::all();

        return view('admin.skripsi', ['skripsi' => $skripsi, 'dosen' => $dosen]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction(); // memulai transaksi

        try {
            $skripsi = new Skripsi();
            $skripsi->kode_skripsi = $request->kode;
            $skripsi->nim = $request->nim;
            $skripsi->nama_penulis = $request->nama;
            $skripsi->judul_ta = $request->judul;
            $skripsi->tahun_lulus = $request->tahun;
            $skripsi->pembimbing1 = $request->pembimbing1;
            $skripsi->pembimbing2 = $request->pembimbing2;
            $skripsi->penguji1 = $request->penguji1;
            $skripsi->penguji2 = $request->penguji2;
            $skripsi->penguji3 = $request->penguji3;
            $skripsi->peminatan = $request->peminatan;
            $skripsi->save();

            $file_skripsi = new FileSkripsi();
            $file_skripsi->kode_skripsi = $request->kode;

            // file ta_cover
            if ($request->file('ta_cover')) {
                $extension = $request->file('ta_cover')->getClientOriginalExtension();
                $fileName = $request->nama . '_' . time() . '.' . $extension;
                $file_skripsi->ta_cover = $fileName; // simpan nama file ke dalam database
                if($request->file('ta_cover')->move(public_path('ta_cover'), $fileName)) {

                }else{
                    $request->file('ta_cover')->delete();
                }
            }

            //file ta_abstrak
            if ($request->file('ta_abstrak')) {
                $extension = $request->file('ta_abstrak')->getClientOriginalExtension();
                $fileName = $request->nama . '_' . time() . '.' . $extension;
                $file_skripsi->ta_abstrak = $fileName; 
                if($request->file('ta_abstrak')->move(public_path('ta_abstrak'), $fileName)) {

                }else{
                    $request->file('ta_abstrak')->delete();
                }
            }

            $file_skripsi->lokasi = $request->lokasi;
            $file_skripsi->save();

            DB::commit(); // commit transaksi
            
            return redirect('/admin/skripsi');
        } catch (\Exception $e) {
            DB::rollback(); // rollback transaksi jika terjadi kesalahan
            return back()->withInput()->withErrors(['msg' => 'Gagal menyimpan data']);
        }
    }

    public function show($id)
    {
        $skripsi = Skripsi::with(['dosen1', 'dosen2', 'dosen3', 'dosen4', 'dosen5'])->findOrFail($id);
        $fileSkripsi = FileSkripsi::findOrFail($id);
        return view('admin.detail_skripsi', ['skripsi'=>$skripsi, 'fileSkripsi'=>$fileSkripsi]);
    }

    public function update(Request $request, $id)
    {
        $skripsi = Skripsi::where('kode_skripsi', $id)->first();
        $skripsi->kode_skripsi = $request->kode;
        $skripsi->nim = $request->nim;
        $skripsi->nama_penulis = $request->nama;
        $skripsi->judul_ta = $request->judul;
        $skripsi->tahun_lulus = $request->tahun;
        $skripsi->pembimbing1 = $request->pembimbing1;
        $skripsi->pembimbing2 = $request->pembimbing2;
        $skripsi->penguji1 = $request->penguji1;
        $skripsi->penguji2 = $request->penguji2;
        $skripsi->penguji3 = $request->penguji3;
        $skripsi->peminatan = $request->peminatan;
        $skripsi->save();

        $file_skripsi = FileSkripsi::where('kode_skripsi', $id)->first();
        if ($request->hasFile('ta_cover')) {
            // Hapus file cover lama
            File::delete(public_path('ta_cover') . '/' . $file_skripsi->ta_cover);

            // Upload file cover baru
            $extension = $request->file('ta_cover')->getClientOriginalExtension();
            $fileName = $request->nama . '_' . time() . '.' . $extension;
            $request->file('ta_cover')->move(public_path('ta_cover'), $fileName);
            $file_skripsi->ta_cover = $fileName;
        }
        
        if ($request->hasFile('ta_abstrak')) {
            // Hapus file cover lama
            File::delete(public_path('ta_abstrak') . '/' . $file_skripsi->ta_abstrak);

            // Upload file cover baru
            $extension = $request->file('ta_abstrak')->getClientOriginalExtension();
            $fileName = $request->nama . '_' . time() . '.' . $extension;
            $request->file('ta_abstrak')->move(public_path('ta_abstrak'), $fileName);
            $file_skripsi->ta_abstrak = $fileName;
        }

        $file_skripsi->lokasi = $request->lokasi;
        $file_skripsi->save();
        return redirect('/admin/skripsi');
    }

    public function destroy($id)
    {
        $skripsi = FileSkripsi::where('kode_skripsi', $id)->first();
      
        File::delete(public_path('ta_cover').'/'.$skripsi->ta_cover);
        File::delete(public_path('ta_abstrak').'/'.$skripsi->ta_abstrak);
        
        Skripsi::where('kode_skripsi', $id)->delete();
        return redirect('/admin/skripsi');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $skripsi = Skripsi::where('judul_ta', 'LIKE', '%' . $keyword . '%')->paginate(25);
        $dosen = Dosen::all();

        return view('admin.skripsi', ['skripsi' => $skripsi, 'dosen' => $dosen]);
    }
}
