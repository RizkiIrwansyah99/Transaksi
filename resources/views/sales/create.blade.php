@extends('Layout.Template')
@section('konten')
        <form action='{{route('simpan.sales')}}' method='post' class="container">
            @csrf   
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name='tanggal' value="{{ old('tanggal') }}" 
                        id="tanggal">
                        <small class="text-danger">{{$errors->first('tanggal')}}</small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="customer_id" class="col-sm-2 col-form-label">Customer ID</label>
                    <div class="col-sm-10">
                        <select id="defaultSelect" class="form-select" name="customer_id">
                            <option value="">Masukan customer</option>
                                @foreach ($customerData as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->nama }}</option>
                                @endforeach
                        </select>
                        <small class="text-danger">{{$errors->first('customer_id')}}</small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Subtotal</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='subtotal' value="{{ old('subtotal')}}" id="subtotal" placeholder="Masukan total belanja customer ">
                        <small class="text-danger">{{$errors->first('subtotal')}}</small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Diskon</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='diskon' value="{{ old('diskon')}}" id="diskon" placeholder="Masukan harga diskon">
                        <small class="text-danger">{{$errors->first('diskon')}}</small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Ongkir</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='ongkir' value="{{ old('ongkir')}}" id="ongkir" placeholder="Masukan harga ongkir">
                        <small class="text-danger">{{$errors->first('ongkir')}}</small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-down"></i> Simpan</button>
                        <a href="{{route('sales.index')}}" class="btn btn-secondary"><i class="bi bi-skip-backward-circle"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </form>
@endsection