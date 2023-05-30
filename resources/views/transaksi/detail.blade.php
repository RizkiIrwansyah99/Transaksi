@extends('Layout.Template')
@section('konten')
    <div class="my-4 p-4 mt-5 container">
        <div class="mb-5">
            <h2>Detail Transaksi</h2>
        </div>
        <div class="shadow p-3 mb-4 bg-body rounded">
            <div class="mb-3 row d-flex justify-content-center">
                <label for="sales_id" class="col-sm-3 col-form-label">Kode Barang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="sales_id" id="sales_id" value="{{ $detail_transaksi->sales_id }}">
                </div>
            </div>
            <div class="mb-3 row d-flex justify-content-center">
                <label for="baran_id" class="col-sm-3 col-form-label">Nama barang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="barang_id" id="barang_id" value="{{ $detail_transaksi->barang_id 
                    }}">
                </div>
            </div>
            <div class="mb-3 row d-flex justify-content-center">
                <label for="harga_bandrol" class="col-sm-3 col-form-label">Harga Bandrol</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="harga_bandrol" id="harga_bandrol" value="{{ $detail_transaksi->harga_bandrol_formatted}}">
                </div>
            </div>
            <div class="mb-3 row d-flex justify-content-center">
                <label for="qty" class="col-sm-3 col-form-label">Jumlah</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="qty" id="qty" value="{{ $detail_transaksi->qty
                    }}">
                </div>
            </div>
            <div class="mb-3 row d-flex justify-content-center">
                <label for="diskon_pct" class="col-sm-3 col-form-label">Diskon (%)</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="diskon_pct" id="diskon_pct" value="{{ $detail_transaksi->diskon_pct_formatted
                    }}">
                </div>
            </div>
            <div class="mb-3 row d-flex justify-content-center">
                <label for="diskon_nilai" class="col-sm-3 col-form-label">Diskon (RP)</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="diskon_nilai" id="diskon_nilai" value="{{ $detail_transaksi->diskon_nilai_formatted
                    }}">
                </div>
            </div>
            <div class="mb-3 row d-flex justify-content-center">
                <label for="harga_diskon" class="col-sm-3 col-form-label">Harga Diskon</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="harga_diskon" id="harga_diskon" value="{{ $detail_transaksi->harga_diskon_formatted
                    }}">
                </div>
            </div>
            <div class="mb-3 row d-flex justify-content-center">
                <label for="total" class="col-sm-3 col-form-label">Total</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="total" id="total" value="{{ $detail_transaksi->total_formatted
                    }}">
                </div>
            </div>
            <div class="mb-2 d-flex justify-content-end align-items-end ">
                <a href="{{route('transaksi.index')}}" class="btn btn-secondary ">Kembali</a>
            </div>
        </div>
    </div>
@endsection