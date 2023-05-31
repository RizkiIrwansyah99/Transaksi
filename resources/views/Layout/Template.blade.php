<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
    crossorigin="anonymous">
    <title>Programming Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.3/dist/css/ionicons.min.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container">
      <a class="navbar-brand" href="{{route('transaksi.index')}}">Transaksi</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item col">
            <a class="nav-link active" aria-current="page" href="{{ url('index-barang')}}">Barang</a>
          </li>
          <li class="nav-item col">
            <a class="nav-link active" aria-current="page" href="{{ url('index-customer') }}">Customer</a>
          </li>
          <li class="nav-item col">
            <a class="nav-link active" aria-current="page" href="{{ url('index-sales') }}">Sales</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Cari" name="katakunci" value="{{ Request::get('katakunci') }}"> 
          <button class="btn btn-outline-success" type="submit">Cari</button>
        </form>
      </div>
    </div>
  </nav>
  
    {{-- <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container">
          <a class="navbar-brand" href="{{route('transaksi.index')}}">Transaksi</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs- 
           target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria- 
            label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('index-barang')}}">Barang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('index-customer') }}">Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('index-sales') }}">Sales</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"     
               name="katakunci" value="{{ Request::get('katakunci') }}"> 
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav> --}}
    @yield('konten')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384- 
    kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
