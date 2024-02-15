<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Merk</td>
                                <td>{{ $rsetBarang->merk }}</td>
                            </tr>
                            <tr>
                                <td>Seri</td>
                                <td>{{ $rsetBarang->seri }}</td>
                            </tr>
                            <tr>
                                <td>Spesifikasi</td>
                                <td>{{ $rsetBarang->spesifikasi }}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>{{ $rsetBarang->kategori->kategori }}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>{{ $rsetBarang->kategori->jenis }}</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>{{ $rsetBarang->stok }}</td>
                            </tr>
                        </table>
                    </div>
               </div>
            </div>

            <!-- <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('storage/foto_barang/'.$rsetBarang->foto_barang) }}" class="w-100 rounded">
                    </div>
                </div>
            </div> -->

        </div>
        <div class="row">
            <div class="col-md-12  text-center">
                

                <a href="{{ route('v_barang.index') }}" class="btn btn-md btn-primary mb-3">Back</a>
            </div>
        </div>
    </div>
@endsection
</body>
</html>