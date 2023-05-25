<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::paginate(50);

        return view('admin.buku', ['buku' => $buku]);
    }

    public function store(Request $request)
    {
        $buku = new Buku();
        $buku->kode_buku = $request->kode;
        $buku->judul_buku = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun;
        $buku->stok = $request->stok;
        if ($request->file('cover')) {
            $extension = $request->file('cover')->getClientOriginalExtension();
            $fileName = $request->kode . '_' . time() . '.' . $extension;
            $buku->cover = $fileName; // simpan nama file ke dalam database
            if (!$request->file('cover')->move(public_path('buku_cover'), $fileName)){
                throw new \Exception('Gagal menyimpan file');
            } // simpan file ke dalam folder storage dengan nama yang sama
        }
        $buku->kategori = $request->kategori;
        $buku->save();
        return redirect('/admin/buku');
    }

    public function show($id)
    {
        $buku = Buku::where('kode_buku', $id)->firstOrFail();
        return view('admin.detail_buku', ['buku' => $buku]);
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->kode_buku = $request->kode;
        $buku->judul_buku = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun;
        $buku->stok = $request->stok;
        $buku->kategori = $request->kategori;

        if ($request->hasFile('cover')) {
            // Hapus file cover lama
            File::delete(public_path('buku_cover') . '/' . $buku->cover);

            // Upload file cover baru
            $extension = $request->file('cover')->getClientOriginalExtension();
            $fileName = $request->kode . '_' . time() . '.' . $extension;
            $request->file('cover')->move(public_path('buku_cover'), $fileName);
            $buku->cover = $fileName;
        }

        $buku->save();
        return redirect('/admin/buku');
    }


    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        File::delete(public_path('buku_cover'). '/' . $buku->cover);
        $buku->delete();

        return redirect('/admin/buku');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $buku = Buku::where('judul_buku', 'LIKE', '%' . $keyword . '%')->paginate(25);

        return view('admin.buku', ['buku' => $buku]);
    }
}
