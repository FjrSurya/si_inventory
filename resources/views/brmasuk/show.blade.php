<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $rsetBrmasuk->barang->merk }}</title>
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
                                <td>{{ $rsetBrmasuk->barang->merk }}</td>
                            </tr>
                            <tr>
                                <td>Seri</td>
                                <td>{{ $rsetBrmasuk->barang->seri }}</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>{{ $rsetBrmasuk->barang->stok }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Masuk</td>
                                <td>{{ $rsetBrmasuk->tgl_masuk }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Barang Masuk</td>
                                <td>{{ $rsetBrmasuk->qty_masuk }}</td>
                            </tr>
                        </table>
                    </div>
               </div>
            </div>

            <!-- <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('storage/foto_brmasuk/'.$rsetBrmasuk->foto_brmasuk) }}" class="w-100 rounded">
                    </div>
                </div>
            </div> -->

        </div>
        <div class="row">
            <div class="col-md-12  text-center">
                

                <a href="{{ route('brmasuk.index') }}" class="btn btn-md btn-primary mb-3">Back</a>
            </div>
        </div>
    </div>
@endsection
</body>
</html>