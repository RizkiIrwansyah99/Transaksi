@extends('Layout.Template')
@section('konten')
<div class="my-4 p-4 mt-5 container">
    <div class="mb-5">
        <h2>Detail Customer</h2>
    </div>
    <div class="shadow p-3 mb-4 bg-body rounded">
        <div class="mb-3 row d-flex justify-content-center">
            <label for="nama" class="col-sm-3 col-form-label">Kode Customer</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode" id="kode" value="{{ $detail_customer->kode 
                }}">
            </div>
        </div>
        <div class="mb-3 row d-flex justify-content-center">
            <label for="nama" class="col-sm-3 col-form-label">Nama Customer</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama" id="nama" value="{{ $detail_customer->nama 
                }}">
            </div>
        </div>
        <div class="mb-3 row d-flex justify-content-center">
            <label for="nama" class="col-sm-3 col-form-label">No. Telpon</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{ $detail_customer->no_telp}}">
            </div>
        </div>
        <div class="mb-2 d-flex justify-content-end align-items-end ">
            <a href="{{route('customer.index')}}" class="btn btn-secondary "><i class="bi bi-skip-backward-circle"></i> Kembali</a>
        </div>
    </div>
</div>
@endsection