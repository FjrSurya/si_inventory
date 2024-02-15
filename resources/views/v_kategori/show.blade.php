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
                                <td>Kategori</td>
                                <td>{{ $rsetKategori->kategori }}</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>{{ $rsetKategori->ketKategori }}</td>
                            </tr>
                            
                        </table>
                    </div>
               </div>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12  text-center">
                <a href="{{ route('v_kategori.index') }}" class="btn btn-md btn-primary mb-3">Back</a>
            </div>
        </div>
    </div>
@endsection
</body>
</html>