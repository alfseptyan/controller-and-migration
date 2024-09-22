<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        $data_buku = Buku::all();

        $no =1;
        $jumlah = $data_buku->count();
        $total_harga = $data_buku->sum('harga');

        return view('index', compact('data_buku', 'no', 'jumlah', 'total_harga'));
    }
    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect()->route('buku.store')->with('success', 'Data berhasil disimpan');

    }
    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();

        return redirect()->route('buku.store')->with('success', 'Data berhasil dihapus');
    }

    public function edit(string $id){
        $buku = Buku::find($id);

        return view('edit', compact('buku'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);

        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect()->route('buku.store');
    }


}