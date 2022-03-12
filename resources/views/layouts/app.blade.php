<!DOCTYPE html>
<html lang="id">
    <head>
        <title>Laravel Googlesheet</title>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
        <script src="/js/jquery-3.6.0.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <style>
          .table-hover tbody tr:hover td {
              background:#f5f3cb;
          }
        </style>
    </head>
    <body class="bg-light">
        <div class="container bg-light rounded mt-2">
            <div class="row p-2 pt-4">
            </div>
            <div class="row p-2 pt-5">
            @if (session('status'))
            <div class="col-12">
              <div class="alert alert-success">
                  {{ session('status') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
            @endif
                <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                          <form action="/search">
                            <div class="row">
                                <div class="col-sm-9">
                                  <h4>Filter</h4>
                                  <div class="row">
                                    <div class="col-8 col-sm-8">
                                        <input class="form-control d-inline" name="keyword" placeholder="Input ..." value="{{ $_GET['keyword'] ?? '' }}" />
                                    </div>
                                    <div class="col-6 col-sm-2">
                                        <button type="submit" class="btn btn-primary float-right d-inline">Cari</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </form>
                        </div>
                        
                        <div class="col-6">
                            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#insertModal"><i class="bi bi-plus-lg"></i> Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-end">
                @if(last(request()->segments()) == 'search')
                <a href="{{ route('dashboard') }}" class="d-inline-block text-dark mt-2"><i class="bi bi-arrow-left"></i> Kembali</a>
                @endif
            </div>
            <div class="row p-4">
                
            @yield('content')
            </div>
        </div>
        <div class="container p-0 text-light">
            &copy; 2022 Kasual.id
        </div>
    @include('modals.edit')
    @include('modals.delete')
    @include('modals.insert')
    </body>
</html>