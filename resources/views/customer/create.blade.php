@extends('Layout.Template')
@section('konten')
<form action='{{route('simpan.customer')}}' method='post' class="container">
    @csrf   
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Customer</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="" 
                id="nama">
                <small class="text-danger">{{$errors->first('nama')}}</small>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">No. Telpon</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='no_telp' value="" id="no_telp">
                <small class="text-danger">{{$errors->first('no_telp')}}</small>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('customer.index')}}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</form>
@endsection