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
                    <a href="{{route('dashboard-product-create')}}" class="btn btn-success">Add New Product</a>
                  </div>
                </div>
                <div class="row mt-3">
                @forelse ($product as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a href="{{route('dashboard-product-details',$product->id)}}" class="card card-dashboard-product d-block">
                        <div class="card-body">
                            <img src="{{Storage::url($product->galleries->first()->photos ?? '')}}" alt="" class="w-100 mb-2" style="border-radius: 10px" />
                            <div class="product-title">{{$product->name}}</div>
                            <div class="product-category">{{$product->categories->name}}</div>
                        </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                        No Product Found
                    </div>
                @endforelse
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
