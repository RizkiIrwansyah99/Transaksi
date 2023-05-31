@extends('Layout.Template')
@section('konten')
<div class="my-4 p-4 mt-5 container">
    <div class="mb-5">
        <h2>Detail Barang</h2>
    </div>
    <div class="shadow p-3 mb-4 bg-body rounded">
        <div class="mb-3 row d-flex justify-content-center">
            <label for="nama" class="col-sm-3 col-form-label">Kode Barang</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode" id="kode" value="{{ $detail_barang->kode 
                }}">
            </div>
        </div>
        <div class="mb-3 row d-flex justify-content-center">
            <label for="nama" class="col-sm-3 col-form-label">Nama Barang</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama" id="nama" value="{{ $detail_barang->nama 
                }}">
            </div>
        </div>
        <div class="mb-3 row d-flex justify-content-center">
            <label for="nama" class="col-sm-3 col-form-label">Harga Barang</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="harga" id="harga" value="{{ $detail_barang->harga_formatted
                }}">
            </div>
        </div>
        <div class="mb-2 d-flex justify-content-end align-items-end ">
            <a href="{{route('barang.index')}}" class="btn btn-secondary "><i class="bi bi-skip-backward-circle"></i> Kembali</a>
        </div>
    </div>
</div>
@endsection