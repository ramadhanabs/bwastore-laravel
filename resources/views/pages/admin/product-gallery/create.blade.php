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
                <h2 class="dashboard-title">Insert Product Photo</h2>
                <p class="dashboard-subtitle">Here where you insert new photo of product</p>
              </div>
              <div class="dashboard-content pt-3">
                  <div class="row">
                      <div class="col-md-12">
                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                         <div class="card">
                             <div class="card-body">
                                <form action="{{route('product-gallery.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group store-cart">
                                            <label>Name Product</label>
                                            <select name="products_id" class="form-control">
                                                @foreach ($product as $product)
                                                    <option value="{{ $product->id }}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group store-cart">
                                            <label>Photo Product</label>
                                            <input type="file" name="photos" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">Save Now</button>
                                    </div>
                                </div>
                                </form>
                             </div>
                         </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
@endsection
