@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('v_kategori.store') }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            
                            <div class="form-group">
                                <label class="font-weight-bold">NAMA KATEGORI</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori') }}" placeholder="Masukkan kategori">

                                <!-- error message untuk kategori -->
                                @error('kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">DESKRIPSI</label>
                                <div class="form-check">
                                    <select class="form-select" name="jenis" aria-label="Default select example">
                                        <option value="blank" selected>Pilih Kategori</option>
                                        <option value="A">A - Alat</option>
                                        <option value="M">M - Barang Modal</option>
                                        <option value="BHP">BHP - Barang Habis Pakai</option>
                                        <option value="BTHP">BTHP - Barang Tidak Habis Pakai</option>
                                    </select>
                                <!-- error message untuk kategori -->
                                @error('kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <br><br>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>

 

            </div>
        </div>
    </div>
@endsection