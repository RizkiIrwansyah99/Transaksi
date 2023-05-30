@extends('Layout.Template')
@section('konten')
<div class="my-3 p-3 mt-4 bg-body rounded shadow-sm container">
    <div class="mb-3" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
        <h2>Daftar Barang</h2>
    </div>
    <div class="pb-3"> 
        <a href='{{route('tambah.barang')}}' class="btn btn-primary">+ Tambah Data</a>
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
            <th class="text-center">Harga Barang</th>
            <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $nomor = 1 + (($data_barang->currentPage()-1 ) * $data_barang->perPage());
            @endphp
            @foreach ($data_barang as $item )
            <tr>
                <td class="text-center">{{$nomor++}}</td>
                <td class="text-center">{{$item->kode}}</td>
                <td class="text-center">{{$item->nama}}</td>
                <td class="text-center">{{$item->harga_formatted}}</td>
                <td class="text-center">
                    <a href="{{ route('detail.barang', ['id'=>$item->id]) }}" type="button" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('edit.barang', ['id' => $item->id]) }}" type="button" class="btn btn-warning 
                        btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ 
                        route('delete.barang', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item{{ $data_barang->onFirstPage() ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $data_barang->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item{{ $data_barang->currentPage() == $data_barang->lastPage() ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $data_barang->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    
</div>
@endsection