@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('v_kategori.update',$rsetKategori->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA KATEGORI</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori',$rsetKategori->kategori) }}" placeholder="Masukkan Kategori">

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
                                        @foreach($aaa as $key=>$val)
                                            @if($rsetKategori->kategori_id==$key)
                                                <option value="{{ $rsetKategori->kategori }}" selected>{{ $rsetKategori->jenis }}</option>
                                            @else
                                                <option value="A">A</option>
                                                <option value="M">M</option>
                                                <option value="BHP">BHP</option>
                                                <option value="BTHP">BTHP</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <!-- error message untuk jenis -->
                                @error('jenis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
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
