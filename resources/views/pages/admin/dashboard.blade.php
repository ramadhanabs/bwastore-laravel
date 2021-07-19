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
                <h2 class="dashboard-title">Dashboard Admin</h2>
                <p class="dashboard-subtitle">Welcome, Admin!</p>
              </div>
              <div class="dashboard-content pt-3">
                <!-- Summary Content -->
                <div class="row">
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Customer</div>
                        <div class="dashboard-card-subtitle">{{$customer}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Revenue</div>
                        <div class="dashboard-card-subtitle">IDR {{$revenue}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Transaction</div>
                        <div class="dashboard-card-subtitle">{{$transaction}}</div>
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

@endpush