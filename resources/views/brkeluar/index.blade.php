<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang KELUAR</title>
</head>

<body>
    @extends('layouts.adm-main')

    @section('content')
    <div class="container">
        <h1>Daftar Barang Keluar</h1>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('brkeluar.create') }}" class="btn btn-md btn-success mb-3">KURANGI STOK BARANG</a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>MERK</th>
                    <th>TANGGAL KELUAR</th>
                    <th>QTY KELUAR</th>
                    <th style="width: 15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rsetBrkeluar as $rowbrkeluar)
                <tr>
                    <td>{{ $rowbrkeluar->barang->merk  }} {{ $rowbrkeluar->barang->seri  }}</td>
                    <td>{{ $rowbrkeluar->tgl_keluar }}</td>                    
                    <td>{{ $rowbrkeluar->qty_keluar }}</td>
                    <td class="text-center">  
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('brkeluar.destroy', $rowbrkeluar->id) }}" method="POST"> 
                             <a href="{{ route('brkeluar.show', $rowbrkeluar->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a> 
                             <a href="{{ route('brkeluar.edit', $rowbrkeluar->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a> 
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
        {{ $rsetBrkeluar->links() }}
    </div>
    @endsection
</body>

</html>
