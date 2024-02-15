<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang Masuk</title>
</head>

<body>
    @extends('layouts.adm-main')

    @section('content')
    <div class="container">
        <h1>Daftar Barang Masuk</h1>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('brmasuk.create') }}" class="btn btn-md btn-success mb-3">TAMBAH STOK BARANG</a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>MERK</th>
                    <th>TANGGAL MASUK</th>
                    <th>QTY MASUK</th>
                    <th style="width: 15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rsetBrmasuk as $rowbrmasuk)
                <tr>
                    <td>{{ $rowbrmasuk->barang->merk  }} {{ $rowbrmasuk->barang->seri  }}</td>
                    <td>{{ $rowbrmasuk->tgl_masuk }}</td>                    
                    <td>{{ $rowbrmasuk->qty_masuk }}</td>
                    <td class="text-center">  
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('brmasuk.destroy', $rowbrmasuk->id) }}" method="POST"> 
                             <a href="{{ route('brmasuk.show', $rowbrmasuk->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a> 
                             <a href="{{ route('brmasuk.edit', $rowbrmasuk->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a> 
                                 @csrf 
                                 @method('DELETE') 
                             <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button> 
                         </form> 
                    </td> 
                                  
                </tr> 
                @empty 
                    <div class="alert"> 
                        Data barang belum tersedia 
                    </div> 
                @endforelse
            </tbody>
        </table>
        {{ $rsetBrmasuk->links() }}
    </div>
    @endsection
</body>

</html>
