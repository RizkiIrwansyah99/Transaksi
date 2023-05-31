@extends('Layout.Template')
@section('konten')
<div class="my-3 p-3 mt-4 container">
    <div class="mb-5">
        <h2>Edit Sales</h2>
    </div>
    <form action='{{route('update.sales', ['id' => $edit_sales->id])}}' method='post' class="container">
        @csrf   
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $edit_sales->tanggal 
                    }}">
                    <small class="text-danger">{{$errors->first('tanggal')}}</small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Customer ID</label>
                <div class="col-sm-10">
                    <select id="defaultSelect" class="form-select" name="customer_id">
                        <option value="">Masukkan customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ $edit_sales->customer_id == $customer->id ? 'selected' : '' }}>
                                {{ $customer->nama }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-danger">{{ $errors->first('customer_id') }}</small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Subtotal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="subtotal" id="subtotal" value="{{ number_format($edit_sales->subtotal, 0, '', '') }}">
                    <small class="text-danger">{{$errors->first('subtotal')}}</small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Diskon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="diskon" id="diskon" value="{{ number_format($edit_sales->diskon, 0, '', '') }}">

                    <small class="text-danger">{{$errors->first('diskon')}}</small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Ongkir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ongkir" id="ongkir" value="{{ number_format($edit_sales->ongkir, 0, '', '') }}">
                    <small class="text-danger">{{$errors->first('ongkir')}}</small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-down"></i> Update</button>
                    <a href="{{route('customer.index')}}" class="btn btn-secondary"><i class="bi bi-skip-backward-circle"></i> Kembali</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection