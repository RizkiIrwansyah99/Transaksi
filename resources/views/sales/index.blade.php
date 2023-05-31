@extends('Layout.Template')
@section('konten')
<div class="my-3 p-3 mt-4 bg-body rounded shadow-sm container">
    <div class="mb-3" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
        <h2>Daftar Transaksi Sales</h2>
    </div>
    <div class="pb-3">
        <a href='{{route('tambah.sales')}}' class="btn btn-primary"><i class="bi bi-plus-circle"></i> Data Transaksi</a>
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
            <th class="text-center">Kode</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Nama Customer</th>
            <th class="text-center">Subtotal</th>
            <th class="text-center">Diskon</th>
            <th class="text-center">Ongkir</th>
            <th class="text-center">Total bayar</th>
            <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $nomor = 1 + (($data_sales->currentPage()-1 ) * $data_sales->perPage());
            @endphp
            @foreach ($data_sales as $item )
            <tr>
                <td class="text-center">{{$nomor++}}</td>
                <td class="text-center">{{$item->kode}}</td>
                <td class="text-center">{{$item->tanggal}}</td>
                <td class="text-center">{{$item->customer->nama}}</td>
                <td>{{$item->subtotal_formatted }}</td>
                <td>{{$item->diskon_formatted}}</td>
                <td>{{$item->ongkir_formatted}}</td>
                <td>{{$item->total_bayar_formatted}}</td>
                <td class="text-center">
                    <a href="{{ route('detail.sales', ['id' => $item->id]) }}" type="button" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{route('edit.sales', ['id' => $item->id])}}" type="button" class="btn btn-warning 
                        btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{route('delete.sales', ['id'=>$item->id])}} 
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
                <li class="page-item{{ $data_sales->onFirstPage() ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $data_sales->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item{{ $data_sales->currentPage() == $data_sales->lastPage() ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $data_sales->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection