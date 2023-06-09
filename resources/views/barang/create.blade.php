@extends('Layout.Template')
@section('konten')
        <form action='{{route('simpan.barang')}}' method='post' class="container">
            @csrf   
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama' value="{{ old('nama') }}" 
                        id="nama" placeholder="Masukan nama barang">
                        <small class="text-danger">{{$errors->first('nama')}}</small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Harga Barang</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='harga' value="{{ old('harga') 
                        }}" id="harga" placeholder="Masukan harga barang">
                        <small class="text-danger">{{$errors->first('harga')}}</small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-down"></i> Simpan</button>
                        <a href="{{route('barang.index')}}" class="btn btn-secondary"><i class="bi bi-skip-backward-circle"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </form>
@endsection