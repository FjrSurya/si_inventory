<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
</head>

<body>
    @extends('layouts.adm-main')

    @section('content')
    <div class="container">
        <h1>Daftar Kategori</h1>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('v_kategori.create') }}" class="btn btn-md btn-success mb-3">TAMBAH KATEGORI</a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Keterangan</th>
                    <th style="width: 15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rsetKategori as $rowkategori)
                <tr>
                    <td>{{ $rowkategori->id }}</td>
                    <td>{{ $rowkategori->kategori}}</td>                    
                    <td>{{ $rowkategori->jenis }}</td>
                    <td>{{ $rowkategori->ketKategori }}</td>
                    <td class="text-center">  
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('v_kategori.destroy', $rowkategori->id) }}" method="POST"> 
                             <a href="{{ route('v_kategori.show', $rowkategori->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a> 
                             <a href="{{ route('v_kategori.edit', $rowkategori->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a> 
                                 @csrf 
                                 @method('DELETE') 
                             <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button> 
                         </form> 
                    </td> 
                                  
                </tr> 
                @empty 
                    <div class="alert"> 
                        Data kategori belum tersedia 
                    </div> 
                @endforelse
            </tbody>
        </table>
        {{ $rsetKategori->links('pagination::bootstrap-5') }}
    </div>
    @endsection
</body>

</html>
