<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProdukController extends Controller
{
    public function index()
    {
        $rows = Produk::paginate(5);

        return view('produk.index', compact('rows'));
    }

    public function cari(Request $request)
    {
        $rows = Produk::where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(5);

        return view('cari', compact('rows'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Simpan file gambar
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $imageName);

        // Simpan data
        Produk::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $imageName
        ]);

        // Set pesan alert
        $request->session()->flash('alert-success', 'Data berhasil disimpan!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('produk');
    }

    public function edit(string $id)
    {
        $row = Produk::find($id);
        return view('produk.edit', compact('row'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $row = Produk::findOrFail($id);

        // Simpan file gambar jika ada
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $row->gambar = $imageName;
        }

        // Update data
        $row->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $row->gambar
        ]);

        // Set pesan alert
        $request->session()->flash('alert-success', 'Data berhasil diupdate!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('produk');
    }

    public function destroy(string $id)
    {
        $row = Produk::findOrFail($id);

        // Hapus gambar jika ada
        if ($row->gambar) {
            $imagePath = public_path('images') . '/' . $row->gambar;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $row->delete();

        // Set pesan alert
        session()->flash('alert-success', 'Data berhasil dihapus!');

        // Arahkan pengguna ke rute yang diinginkan
        return redirect('produk');
    }
}
