@extends('layouts.dashboard')

@section('title')
    Dashboard - Product Details
@endsection

@section('content')
    <div class="section-content section-dashboard-home">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">{{$product->name}}</h2>
                <p class="dashboard-subtitle">Product Details</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                    <form action="{{route('dashboard-product-update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group store-cart">
                                <label for="productName">Product Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="productName"
                                  aria-describedby="emailHelp"
                                  name="name"
                                  value="{{$product->name}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group store-cart">
                                <label for="price">Price</label>
                                <input
                                  type="number"
                                  class="form-control"
                                  id="price"
                                  aria-describedby="emailHelp"
                                  name="price"
                                  value="{{$product->price}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group store-cart">
                                <label for="storeCategory">Store Category</label>
                                <select name='categories_id' id="storeCategory" class="form-control" value="{{$product->categories}}" selected>
                                <option value="{{$product->categories_id}}">{{$product->categories->name}}</option>
                                @foreach ($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group store-cart">
                                <label for="description">Description</label>
                                <textarea name="description" id="editor" cols="30" rows="4" class="form-control">
                                    {!! $product->description !!}
                                </textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-success btn-block px-5">Update Product</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row mt-3 mb-3">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                        @forelse ($product->galleries as $gallery)
                        <div class="col-md-4">
                            <div class="gallery-container">
                                <img src="{{Storage::url($gallery->photos ?? '')}}" alt="" class="w-100" style="border-radius: 10px"/>
                                <a href="{{route('dashboard-product-gallery-delete', $gallery->id)}}" class="delete-gallery">
                                <img src="/images/icon-remove.svg" alt="" />
                                </a>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            No Photos Found. Upload it now!
                        </div>
                        @endforelse
                        <div class="col-md-12 mt-4">
                            <form action="{{route("dashboard-product-upload-gallery")}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" name ="products_id" value="{{$product->id}}">
                                <input
                                    type="file"
                                    name="photos"
                                    id="file"
                                    style="display:none"
                                    onchange="form.submit()"
                                />
                                <button type="button" class="btn btn-secondary w-100" onclick="thisFileUpload()">Add Photo</button>
                            </form>
                        </div>
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
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace("editor");
    </script>
    <script>
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script>
@endpush
