<?php

namespace App\Http\Controllers;
use App\Models\Brmasuk;
use App\Models\Barang;
use App\models\Kategori;
use Illuminate\Http\Request;

class BrmasukController extends Controller
{
    public function index(){
    $rsetBrmasuk = Brmasuk::latest()->paginate(100);
    return view('brmasuk.index', compact('rsetBrmasuk'));
    }

    public function create(){
        $brcr = Barang::all();
        return view('brmasuk.create', compact('brcr'));
    }

    public function store(Request $request){
        $request->validate([
            'tgl_masuk' => 'required',
            'qty_masuk' => 'required',
            'barang_id' => 'required',
        ]);

        Brmasuk::create([
            'tgl_masuk' => $request->tgl_masuk,
            'qty_masuk' => $request->qty_masuk,
            'barang_id' => $request->barang_id,
        ]);
        
        return redirect()->route('brmasuk.index')->with('success', 'Data barang berhasil masukkan');
    }

    public function show(string $id)
    {
        $rsetBrmasuk = Brmasuk::find($id);

        return view('brmasuk.show', compact('rsetBrmasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rsetBrmasuk = Brmasuk::findOrFail($id);
        $aBarang = Barang::all();

        //return $rsetBarang;
        return view('brmasuk.edit', compact('rsetBrmasuk','aBarang'));
    }

    public function update(Request $request, string $id){
        $this->validate($request,[
            'tgl_masuk' => 'required',
            'qty_masuk' => 'required',
            'barang_id' => 'required',
        ]);

        $rsetBrmasuk = Brmasuk::findOrFail($id);

            $rsetBrmasuk->update([
                'tgl_masuk' => $request->tgl_masuk,
                'qty_masuk' => $request->qty_masuk,
                'barang_id' => $request->barang_id,
            ]);
        
        return redirect()->route('brmasuk.index')->with(['Success' => 'Data berhasil diubah!']);
    }

    public function destroy($id){
        $rsetBrmasuk = Brmasuk::findOrFail($id);
        $rsetBrmasuk->delete();
        
        return redirect()->route('brmasuk.index')->with('Success', 'Data barang berhasil dihapus.');
    }
}
    