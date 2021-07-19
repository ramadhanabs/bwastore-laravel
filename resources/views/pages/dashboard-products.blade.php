@extends('layouts.dashboard')

@section('title')
    Dashboard - My Products
@endsection

@section('content')
    <div class="section-content section-dashboard-home">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Products</h2>
                <p class="dashboard-subtitle">Manage it well and get money</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <a href="/dashboard-product-create.html" class="btn btn-success">Add New Product</a>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="/dashboard-product-details.html" class="card card-dashboard-product d-block">
                      <div class="card-body">
                        <img src="/images/dashboard-products-1.png" alt="" class="w-100 mb-2" />
                        <div class="product-title">Excelso Coffee</div>
                        <div class="product-category">Food & Beverage</div>
                      </div>
                    </a>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="/dashboard-product-details.html" class="card card-dashboard-product d-block">
                      <div class="card-body">
                        <img src="/images/dashboard-products-2.png" alt="" class="w-100 mb-2" />
                        <div class="product-title">Nike Airmax</div>
                        <div class="product-category">Fashion</div>
                      </div>
                    </a>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="/dashboard-product-details.html" class="card card-dashboard-product d-block">
                      <div class="card-body">
                        <img src="/images/dashboard-products-3.png" alt="" class="w-100 mb-2" />
                        <div class="product-title">Sofa Ikea</div>
                        <div class="product-category">Furniture</div>
                      </div>
                    </a>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="/dashboard-product-details.html" class="card card-dashboard-product d-block">
                      <div class="card-body">
                        <img src="/images/dashboard-products-2.png" alt="" class="w-100 mb-2" />
                        <div class="product-title">Nike Air Jordan</div>
                        <div class="product-category">Fashion</div>
                      </div>
                    </a>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="/dashboard-product-details.html" class="card card-dashboard-product d-block">
                      <div class="card-body">
                        <img src="/images/dashboard-products-1.png" alt="" class="w-100 mb-2" />
                        <div class="product-title">Starbucks Coffee</div>
                        <div class="product-category">Food & Beverage</div>
                      </div>
                    </a>
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
@endpush