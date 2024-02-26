<?php

namespace App\Http\Controllers;

use App\Models\Album;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_album' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $album = new Album([
            'nama_album' => $request->nama_album,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->id(), // Otomatis gunakan ID user yang sedang login
        ]);

        $album->save();

        return redirect()->route('albums.index')->with('success', 'Album has been added');
    }

    public function index()
    {
        $albums = Album::with('user')->get(); // Mengambil semua album beserta data pengguna yang terkait
        return view('albums.index', ['albums' => $albums]);
    }

    // Untuk menampilkan form edit
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('albums.edit', compact('album'));
    }


    // Untuk memperbarui album di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_album' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);


        $album = Album::findOrFail($id);
        $album->update([
            'nama_album' => $request->nama_album,
            'deskripsi' => $request->deskripsi,
        ]);


        return redirect()->route('albums.index')->with('success', 'Album has been updated');
    }


    // Untuk menghapus album
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();


        return redirect()->route('albums.index')->with('success', 'Album has been deleted');
    }

}
