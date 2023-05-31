@extends('Layout.Template')
@section('konten')
<div class="my-4 p-4 mt-5 container">
    <div class="mb-5">
        <h2>Detail Sales</h2>
    </div>
    <div class="shadow p-3 mb-4 bg-body rounded">
        <div class="mb-3 row d-flex justify-content-center">
            <label for="kode" class="col-sm-3 col-form-label">Kode Customer</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode" id="kode" value="{{ $detail_sales->kode }}">
            </div>
        </div>
        <div class="mb-3 row d-flex justify-content-center">
            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="tanggal" id="tanggal" value="{{ $detail_sales->tanggal 
                }}">
            </div>
        </div>
        <div class="mb-3 row d-flex justify-content-center">
            <label for="customer_id" class="col-sm-3 col-form-label">Customer ID</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="customer_id" id="customer_id" value="{{ $detail_sales->customer_id}}">
            </div>
        </div>
        <div class="mb-3 row d-flex justify-content-center">
            <label for="subtotal" class="col-sm-3 col-form-label">Subtotal</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="subtotal" id="subtotal" value="{{ $detail_sales->subtotal_formatted
                }}">
            </div>
        </div>
        <div class="mb-3 row d-flex justify-content-center">
            <label for="diskon" class="col-sm-3 col-form-label">Diskon</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="diskon" id="diskon" value="{{ $detail_sales->diskon_formatted
                }}">
            </div>
        </div>
        <div class="mb-3 row d-flex justify-content-center">
            <label for="ongkir" class="col-sm-3 col-form-label">Ongkir</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="ongkir" id="ongkir" value="{{ $detail_sales->ongkir_formatted
                }}">
            </div>
        </div>
        <div class="mb-3 row d-flex justify-content-center">
            <label for="diskon" class="col-sm-3 col-form-label">Total Bayar</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="diskon" id="diskon" value="{{ $detail_sales->total_bayar_formatted
                }}">
            </div>
        </div>
        <div class="mb-2 d-flex justify-content-end align-items-end ">
            <a href="{{route('sales.index')}}" class="btn btn-secondary "><i class="bi bi-skip-backward-circle"></i> Kembali</a>
        </div>
    </div>
</div>
@endsection