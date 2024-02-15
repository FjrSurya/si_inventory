<?php

namespace App\Http\Controllers;
use App\Models\Brkeluar;
use App\Models\Barang;
use App\models\Kategori;
use Illuminate\Http\Request;

class BrkeluarController extends Controller
{
    public function index(){

    $rsetBrkeluar = Brkeluar::latest()->paginate(100);
    return view('brkeluar.index', compact('rsetBrkeluar'));
    }

    public function create(){
        $brcr = Barang::all();
        return view('brkeluar.create', compact('brcr'));
    }

    public function store(Request $request){
        $request->validate([
            'tgl_keluar' => 'required',
            'qty_keluar' => 'required',
            'barang_id' => 'required',
        ]);

        Brkeluar::create([
            'tgl_keluar' => $request->tgl_keluar,
            'qty_keluar' => $request->qty_keluar,
            'barang_id' => $request->barang_id,
        ]);
        
        return redirect()->route('brkeluar.index');
    }

    public function show(string $id)
    {
        $rsetBrkeluar = Brkeluar::find($id);

        return view('brkeluar.show', compact('rsetBrkeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rsetBrkeluar = Brkeluar::find($id);
        $aBarang = Barang::find($rsetBrkeluar->barang_id);

        //return $rsetBarang;
        return view('brkeluar.edit', compact('rsetBrkeluar','aBarang'));
    }

    public function update(Request $request, string $id){
        $this->validate($request,[
            'tgl_keluar' => 'required',
            'qty_keluar' => 'required',
        ]);

        $rsetBrkeluar = Brkeluar::find($id);

            $rsetBrkeluar->update([
                'tgl_keluar' => $request->tgl_keluar,
                'qty_keluar' => $request->qty_keluar,
            ]);
        
        return redirect()->route('brkeluar.index')->with(['Success' => 'Data berhasil diubah!']);
    }

    public function destroy($id){
        Brkeluar::findOrFail($id)->delete();
        
        return redirect()->route('brkeluar.index')->with('Success', 'Data barang berhasil dihapus.');
    }
}
