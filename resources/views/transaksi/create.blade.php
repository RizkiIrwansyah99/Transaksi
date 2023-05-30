@extends('Layout.Template')
@section('konten')
        <form action='{{route('simpan.transaksi')}}' method='post' class="container">
            @csrf   
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <label for="sales_id" class="col-sm-2 col-form-label">Sales data</label>
                    <div class="col-sm-10">
                        <select id="defaultSelect" class="form-select" name="sales_id">
                            <option>Masukan sales nama customer</option>
                            @foreach ($salesData as $item)
                                <option value="{{$item->id}}">{{$item->customer->nama}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger text-sm mt-1">{{$errors->first('sales_id')}}</span>    
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kode" class="col-sm-2 col-form-label">Kode Barang</label>
                    <div class="col-sm-10">
                        <select id="barang_id" class="form-select" name="barang_id">
                            <option value="">Masukkan kode barang</option>
                            @foreach ($barangData as $barang)
                            <option value="{{ $barang->id }}" data-nama="{{ $barang->nama }}" data-harga="{{ $barang->harga }}">{{ $barang->nama }} 
                            </option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{$errors->first('barang_id')}}</small>
                    </div>
                </div>
                {{-- <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="barang_id" value="{{ old('barang_id') }}" id="nama_barang" readonly>
                    </div>
                </div> --}}
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Harga Bandrol</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="harga_bandrol" value="{{ old('harga_bandrol')}}" id="harga_bandrol" readonly>
                        <small class="text-danger">{{$errors->first('qty')}}</small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='qty' value="{{ old('qty')}}" id="qty">
                        <small class="text-danger">{{$errors->first('qty')}}</small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Diskon (%)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='diskon_pct' value="{{ old('diskon_pct')}}" id="diskon_pct">
                        <small class="text-danger">{{$errors->first('diskon_pct')}}</small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Diskon (RP)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='diskon_nilai' value="{{ old('diskon_nilai')}}" id="diskon_nilai">
                        <small class="text-danger">{{$errors->first('diskon_nilai')}}</small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Total diskon</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='harga_diskon' value="{{ old('harga_diskon')}}" id="harga_diskon">
                        <small class="text-danger">{{$errors->first('harga_diskon')}}</small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Total harga</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='total' value="{{ old('total')}}" id="total">
                        <small class="text-danger">{{$errors->first('total')}}</small>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('transaksi.index')}}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </form>


        <script>
            document.getElementById('barang_id').addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                var hargaBandrol = selectedOption.getAttribute('data-harga');
                var parsedHarga = parseFloat(hargaBandrol).toFixed(0);
                document.getElementById('harga_bandrol').value = parsedHarga;
                calculateHargaDiskon();                
            });
        
            document.getElementById('diskon_pct').addEventListener('input', function() {
                calculateDiskonValue();
                calculateHargaDiskon();
            });
        
            document.getElementById('diskon_nilai').addEventListener('input', function() {
                calculateDiskonPercentage();
                calculateHargaDiskon();
            });
        
            document.getElementById('qty').addEventListener('input', function() {
                calculateHargaDiskon();
            });
        
            function calculateDiskonValue() {
                var hargaBandrol = parseFloat(document.getElementById('harga_bandrol').value);
                var diskonPct = parseFloat(document.getElementById('diskon_pct').value);
                var diskonNilai = hargaBandrol * (diskonPct / 100);
                document.getElementById('diskon_nilai').value = diskonNilai.toFixed(0);
            }

            function calculateDiskonPercentage() {
                var hargaBandrol = parseFloat(document.getElementById('harga_bandrol').value);
                var diskonNilai = parseFloat(document.getElementById('diskon_nilai').value);
                var diskonPct = (diskonNilai / hargaBandrol) * 100;
                document.getElementById('diskon_pct').value = diskonPct.toFixed(0);
            }

            function calculateHargaDiskon() {
                var hargaBandrol = parseFloat(document.getElementById('harga_bandrol').value);
                var diskonNilai = parseFloat(document.getElementById('diskon_nilai').value);
                var qty = parseFloat(document.getElementById('qty').value);
                var hargaDiskon = hargaBandrol - diskonNilai;
                var total = hargaDiskon * qty;
                document.getElementById('harga_diskon').value = hargaDiskon.toFixed(0);
                document.getElementById('total').value = total.toFixed(0);
            }
        </script>    
@endsection