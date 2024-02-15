<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use App\Models\Barang;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //Memanggil store procedure : OK
        //  return DB::select('CALL getKategoriAll');
        //  $rsetKategori = DB::select('CALL getKategoriAll');
        //  return view('v_kategori.index', compact('rsetKategori'));

        // $rsetKategori = Kategori::latest()->paginate(10);
        // $rsetKategori = Kategori::find(1)->barangs();

        // dd($rsetKategori);
        // return $rsetKategori->all();

        // $rsetKategori = DB::table('kategori')->paginate(2);

        // $rsetKategori = DB::table('kategori')
        //     ->select('id','kategori', 'jenis')
        //     ->paginate(2);


        $rsetKategori = Kategori::select('id','jenis','kategori',
            \DB::raw('(CASE
                WHEN jenis = "M" THEN "Modal"
                WHEN jenis = "A" THEN "Alat"
                WHEN jenis = "BHP" THEN "Bahan Habis Pakai"
                ELSE "Bahan Tidak Habis Pakai"
                END) AS ketKategori'))
            ->paginate(100);
            
        
            //  OK

        // $rsetKategori = DB::select('CALL getKategoriAll()','ketKategori("M")');
        // $rsetKategori = DB::raw("SELECT ketKategori("M") as someValue') ;

        // $rsetKategori = DB::table('kategori')
        //      ->select('id','jenis',DB::raw('ketKategori(kategori) as ketkategori'))
        //      ->get();

       // return $rsetKategori;


        // $rsetKategori = DB::table('kategori')
        //                 ->select('id','jenis',DB::raw('ketKategori(kategori) as ketkategori'))->paginate(1);



        //  return view('v_kategori.index',compact('rsetKategori'));

        // $rsetKategori = Kategori::all();
        // return view('v_kategori.relasi', compact('rsetKategori'));



        // return DB::table('kategori')->get();

        // $rsetKategori = Kategori::getKategoriAll()->paginate(1);
        return view('v_kategori.index', compact('rsetKategori'));
        // return $rsetKategori;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $aKategori = array('blank'=>'Pilih Kategori',
        //                     'M'=>'Barang Modal',
        //                     'A'=>'Alat',
        //                     'BHP'=>'Bahan Habis Pakai',
        //                     'BTHP'=>'Bahan Tidak Habis Pakai'
        //                     );
        // return view('v_kategori.create',compact('aKategori'));
        return view('v_kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

        $this->validate($request, [
            'jenis'   => 'required',
            'kategori'     => 'required',
        ]);


        //create post
        Kategori::create([
            'jenis'  => $request->jenis,
            'kategori'  => $request->kategori,
        ]);

        //redirect to index
        return redirect()->route('v_kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $rsetKategori = Kategori::find($id);

        $rsetKategori = Kategori::select('id','jenis','kategori',
            \DB::raw('(CASE
                WHEN jenis = "M" THEN "Modal"
                WHEN jenis = "A" THEN "Alat"
                WHEN jenis = "BHP" THEN "Bahan Habis Pakai"
                ELSE "Bahan Tidak Habis Pakai"
                END) AS ketKategori'))
                ->where('id', '=', $id)
                ->first();

        return view('v_kategori.show', compact('rsetKategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rsetKategori = Kategori::find($id);
        $aaa = Kategori::all();
        // $rsetBarang = Barang::find($id);

        $aKategori = array('blank'=>'Pilih Kategori',
                        'M'=>'Barang Modal',
                        'A'=>'Alat',
                        'BHP'=>'Bahan Habis Pakai',
                        'BTHP'=>'Bahan Tidak Habis Pakai'
        );

        //return $rsetBarang;
        return view('v_kategori.edit', compact('aKategori','rsetKategori', 'aaa'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'jenis'              => 'required',
            'kategori'               => 'required',
            // 'foto'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

            $rsetKategori = Kategori::find($id);
  

            $rsetKategori->update([
                'jenis' =>$request->jenis,
                'kategori'  => $request->kategori
            ]);

         
        

        //redirect to index
        return redirect()->route('v_kategori.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    {

        //cek apakah kategori_id ada di tabel barang.kategori_id ?

        if (DB::table('barang')->where('kategori_id', $id)->exists()){

            return redirect()->route('v_kategori.index')->with(['Gagal' => 'Data Gagal Dihapus!']);

        } else {

            $rsetKategori = Kategori::find($id);

            $rsetKategori->delete();

            return redirect()->route('v_kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);

        }

    }
}
