@extends('Layout.Template')
@section('konten')
    <div class="my-3 p-3 mt-4 bg-body rounded shadow-sm container">
        <div class="mb-3" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
            <h2>Daftar Customer</h2>
        </div>
        <div class="pb-3"> 
            <a href='{{route('tambah.customer')}}' class="btn btn-primary"><i class="bi bi-plus-circle"></i> Data Customer</a>
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
                <th class="text-center">Nama Customer</th>
                <th class="text-center">No. Telpon</th>
                <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nomor = 1 + (($data_customer->currentPage()-1 ) * $data_customer->perPage());
                @endphp
                @foreach ($data_customer as $item )
                <tr>
                    <td class="text-center">{{$nomor++}}</td>
                    <td class="text-center">{{$item->kode}}</td>
                    <td class="text-center">{{$item->nama}}</td>
                    <td class="text-center">{{$item->no_telp}}</td>
                    <td class="text-center">
                        <a href="{{ route('detail.customer', ['id' => $item->id]) }}" type="button" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{route('edit.customer', ['id' => $item->id])}}" type="button" class="btn btn-warning 
                            btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{route('delete.customer', ['id'=>$item->id])}}" method="POST">
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
                    <li class="page-item{{ $data_customer->onFirstPage() ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $data_customer->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item{{ $data_customer->currentPage() == $data_customer->lastPage() ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $data_customer->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection