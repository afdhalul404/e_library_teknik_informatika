<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::paginate(50);

        return view('admin.dosen', ['dosen' => $dosen]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|numeric',
            'nama' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Dosen::create([
            'nip' => $request->nip,
            'nama_dosen' => $request->nama
        ]);

        return redirect('/admin/dosen');
    }

    public function update(Request $request, $id)
    {
        $nip = $id;
        $dosen = Dosen::findOrFail($nip);
        $dosen->nama_dosen = $request->nama;
        $dosen->save();

        return redirect('/admin/dosen');
    }

    public function destroy($id)
    {
        $nip = $id;
        $dosen = Dosen::findOrFail($nip);
        $dosen->delete();

        return redirect('/admin/dosen');
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        
        $dosen = Dosen::where('nama_dosen', 'LIKE', '%' . $keyword . '%')->paginate(25);

        return view('admin.dosen', ['dosen'=>$dosen]);
    }
}
