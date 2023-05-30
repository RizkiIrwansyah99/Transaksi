@extends('Layout.Template')
@section('konten')
<div class="my-3 p-3 mt-4 container">
    <div class="mb-5">
        <h2>Edit Customer</h2>
    </div>
    <form action='{{route('update.customer', ['id' => $edit_customer->id])}}' method='post' class="container">
        @csrf   
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Customer</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="nama" value="{{ $edit_customer->nama 
                    }}">
                    <small class="text-danger">{{$errors->first('nama')}}</small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">No. Telpon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{ $edit_customer->no_telp 
                    }}">
                    <small class="text-danger">{{$errors->first('no_telp')}}</small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('customer.index')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection