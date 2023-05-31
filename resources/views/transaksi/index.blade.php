@extends('Layout.Template')
@section('konten')
<div class="my-3 p-3 mt-4 bg-body rounded shadow-sm container">
    <div class="mb-3" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
        <h2>Daftar Transaksi</h2>
    </div>
    <div class="pb-3">
        <a href='{{route('tambah.transaksi')}}' class="btn btn-primary"><i class="bi bi-plus-circle"></i> Data Transaksi</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    @if ($pesan)
        <div class="alert alert-info">{{ $pesan }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kode Barang</th>
                <th class="text-center">Nama Barang</th>
                <th class="text-center">Harga Bandrol</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Diskon (%)</th>
                <th class="text-center">Diskon (Rp)</th>
                <th class="text-center">Harga Diskon</th>
                <th class="text-center">Total</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $nomor = 1 + (($data_transaksi->currentPage()-1 ) * $data_transaksi->perPage());
            @endphp
            @foreach ($data_transaksi as $item )
            <tr>
                <td class="text-center">{{$nomor++}}</td>
                <td class="text-center">{{$item->barang->kode}}</td>
                <td>{{$item->barang->nama}}</td>
                <td>{{$item->harga_bandrol_formatted}}</td>
                <td class="text-center">{{$item->qty}}</td>
                <td class="text-center">{{$item->diskon_pct_formatted}}</td>
                <td>{{$item->diskon_nilai_formatted}}</td>
                <td>{{$item->harga_diskon_formatted}}</td>
                <td>{{$item->total_formatted}}</td>
                <td>
                    <a href="{{route('detail.transaksi', ['id' => $item->id])}}" type="button" class="btn btn-info btn-sm d-block d-sm-inline">Detail</a>
                    <a href="{{route('edit.transaksi', ['id' => $item->id])}}" type="button" class="btn btn-warning 
                        btn-sm d-block d-sm-inline"><i class="bi bi-pencil-square"></i> Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{route('delete.transaksi', ['id'=>$item->id])}} 
                     " method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> Delete</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item{{ $data_transaksi->onFirstPage() ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $data_transaksi->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item{{ $data_transaksi->currentPage() == $data_transaksi->lastPage() ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $data_transaksi->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection