<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
</head>

<body>
    @extends('layouts.adm-main')

    @section('content')
    <div class="container">
        <h1>Daftar Barang</h1>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('v_barang.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BARANG</a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Merk</th>
                    <th>Seri</th>
                    <th>Spesifikasi</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th style="width: 15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rsetBarang as $rowbarang)
                <tr>
                    <td>{{ $rowbarang->id }}</td>
                    <td>{{ $rowbarang->merk }}</td>
                    <td>{{ $rowbarang->seri }}</td>
                    <td>{{ $rowbarang->spesifikasi }}</td>
                    <td>{{ $rowbarang->stok }}</td>
                    <td>{{ $rowbarang->kategori->kategori}}</td>                    
                    <td>{{ $rowbarang->kategori->jenis }}</td>
                    <td class="text-center">  
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('v_barang.destroy', $rowbarang->id) }}" method="POST"> 
                             <a href="{{ route('v_barang.show', $rowbarang->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a> 
                             <a href="{{ route('v_barang.edit', $rowbarang->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a> 
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
        {{ $rsetBarang->links() }}
    </div>
    @endsection
</body>

</html>
