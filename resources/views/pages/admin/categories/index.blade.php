@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@push('addon-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.css"/>
@endpush

@section('content')
    <div class="section-content section-dashboard-home">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Category</h2>
                <p class="dashboard-subtitle">List of Categories</p>
              </div>
              <div class="dashboard-content pt-3">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-body">
                                  <a href="{{route('category.create')}}" class="btn btn-primary mb-5">+Tambah Kategori Baru</a>
                                  <div class="table-responsive">
                                      <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                          <thead>
                                              <tr>
                                                  <th>Id</th>
                                                  <th>Nama</th>
                                                  <th>Foto</th>
                                                  <th>Slug</th>
                                                  <th>Aksi</th>
                                              </tr>
                                          </thead>
                                          <tbody>

                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.js"></script>
    <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'photo', name: 'photo'},
                {data: 'slug', name: 'slug'},
                {
                    data: 'action', 
                    name: 'action',
                    orderable: 'false',
                    searchable: 'false',
                    width: '15%',
                },
                
            ]
        });
    </script>

@endpush