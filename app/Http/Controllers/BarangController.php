<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Brmasuk;
use Illuminate\Support\Facades\Storage;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rsetBarang = Barang::latest()->paginate(100);
        return view('v_barang.index',compact('rsetBarang'));
        // $rsetBarang = Barang::all();
        // return view('v_barang.1',compact('rsetBarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aKategori = Kategori::all();
    
        return view('v_barang.create',compact('aKategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'merk'              => 'required',
            'seri'              => 'required',
            'spesifikasi'       => 'required',
            'kategori_id'          => 'required',
            // 'foto'              => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);



        // //upload image
        // $foto = $request->file('foto');
        // $foto->storeAs('public/foto_barang', $foto->hashName());

        //create post
        Barang::create([
            'merk'          => $request->merk,
            'seri'          => $request->seri,
            'spesifikasi'   => $request->spesifikasi,
            'kategori_id'      => $request->kategori_id,
            // 'foto'          => $foto->hashName()
        ]);

        //redirect to index
        return redirect()->route('v_barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rsetBarang = Barang::find($id);

        return view('v_barang.show', compact('rsetBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aKategori = Kategori::all();
        $rsetBarang = Barang::find($id);

        //return $rsetBarang;
        return view('v_barang.edit', compact('rsetBarang','aKategori'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'merk'              => 'required',
            'seri'              => 'required',
            'spesifikasi'       => 'required',
            'kategori_id'          => 'required',
            // 'foto'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $rsetBarang = Barang::find($id);

        //check if image is uploaded
        // if ($request->hasFile('foto')) {

        //     //upload new image
        //     $foto = $request->file('foto');
        //     $fototoreAs('public/foto_barang', $foto->hashName());

        //     //delete old image
        //     Storage::delete('public/foto_barang/'.$rsetBarang->foto);

            //update post with new image
            $rsetBarang->update([
                'merk'    => $request->merk,
                'seri'          => $request->seri,
                'spesifikasi'     => $request->spesifikasi,
                'kategori_id'  => $request->kategori_id,
                
            ]);

         
        

        //redirect to index
        return redirect()->route('v_barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rsetBarang = Barang::find($id);
        //delete image
        // Storage::delete('public/foto_barang/'. $rsetBarang->foto);

        //delete post
        $rsetBarang->delete();

        //redirect to index
        return redirect()->route('v_barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
