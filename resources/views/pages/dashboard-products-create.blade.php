@extends('layouts.dashboard')

@section('title')
    Dashboard - My Products
@endsection

@section('content')
    <div class="section-content section-dashboard-home">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Create New Product</h2>
                <p class="dashboard-subtitle">Create your own product</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="">
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
                                  name="productName"
                                  value="Papel La Casa"
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
                                  value="$17.000"
                                />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group store-cart">
                                <label for="storeCategory">Store Category</label>
                                <select name="storeCategory" id="storeCategory" class="form-control" value="Furniture">
                                  <option value="#">Furniture</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group store-cart">
                                <label for="description">Description</label>
                                <textarea name="editor" id="" cols="30" rows="4" class="form-control">
The Nike Air Max 720 SE goes bigger than ever before with Nike's tallest Air unit yet for unimaginable, all-day comfort. There's super breathable fabrics on the upper, while colours add a modern edge. Bring the past into the future with the Nike Air Max 2090, a bold look inspired by the DNA of the iconic Air Max 90. Brand-new Nike Air cushioning
                                </textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group store-cart">
                                <label for="thumbnails">Thumbnails</label>
                                <input
                                  type="file"
                                  multiple
                                  class="form-control pt-1"
                                  id="thumbnails"
                                  aria-describedby="thumbnails"
                                  name="thumbnails"
                                />
                                <small class="text-muted"> Kamu dapat memilih lebih dari satu file </small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3 mb-5">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-success btn-block px-5">Save Now</button>
                        </div>
                      </div>
                    </form>
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
@endpush