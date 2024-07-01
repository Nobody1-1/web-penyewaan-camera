<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Carbon\Carbon;

class cameraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.camera');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createcamera');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // contoh validasi untuk gambar
            'harga' => 'required|numeric|min:0',
            'jumlah' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
        ]);
        $camera = new Barang();

        // Upload gambar ke storage atau sistem file server
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/image');
            // Remove 'public/' prefix when storing in the database
            $camera->gambar = str_replace('public/', '', $gambarPath);
        }
        // $dd($camera->gambar);

        $now = Carbon::now();
        $camera->nama_barang = $request->nama_barang;
        $camera->harga = $request->harga;
        $camera->kode_barang = 'FFF'.$now->hour.$now->minute;
        $camera->jumlah = $request->jumlah;
        $camera->deskripsi = $request->deskripsi;
        $camera->save();

        return redirect()->route('admin.datacamera')->with('success', 'Camera Created successfully');
    }


    public function edit(string $id)
    {
        $camera = Barang::find($id);

        return view('admin.editCamera',[
            'camera' => $camera,
        ]);
    }

    public function show($id)
    {
        $camera = Barang::find($id);
        return view('admin.detailCamera',compact('camera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
        ]);
    
        // Ambil objek yang sudah ada di database
        $camera = Barang::findOrFail($id);
        $camera->nama_barang = $request->input('nama_barang');
    
        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            // Simpan gambar di folder 'public/image'
            $gambarPath = $request->file('gambar')->store('public/image');
            // Simpan path gambar tanpa 'public/' di database
            $camera->gambar = str_replace('public/', '', $gambarPath);
        }
    
        $camera->harga = $request->input('harga');
        $camera->harga = $request->input('jumlah');
        $camera->deskripsi = $request->input('deskripsi');
        $camera->save();
    
        return redirect()->route('admin.datacamera')->with('success', 'Camera updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $camera = Barang::find($id);

        if($camera->gambar != 'noimage.jpg') {
            $filepath = public_path('storage/') . $camera->gambar;
            unlink($filepath);
        }
        $camera->delete();
        return redirect(route('admin.datacamera'))->with('message', 'Camera berhasil dihapus!');
    }
}
