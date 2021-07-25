@extends('layouts.dashboard')

@section('title')
    Dashboard - Store Setting
@endsection

@section('content')
    <div class="section-content section-dashboard-home">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Store Setting</h2>
                <p class="dashboard-subtitle">Make store that profitable</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="{{route('dashboard-setting-redirect','dashboard-store-setting')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group store-cart">
                                <label for="storeName">Store Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="storeName"
                                  aria-describedby="emailHelp"
                                  name="store_name"
                                  value="{{$user->store_name}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group store-cart">
                                <label for="storeCategory">Store Category</label>
                                <select name="categories_id" id="storeCategory" class="form-control" value="">
                                <option value="{{$user->categories_id}}">--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Store Status</label>
                              <p class="text-muted font-weight-light">Apakah saat ini toko Anda buka?</p>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input
                                  type="radio"
                                  class="custom-control-input"
                                  name="store_status"
                                  id="openStoreTrue"
                                  value="1"
                                  {{$user->store_status == 1 ? 'checked' : ''}}
                                />
                                <label for="openStoreTrue" class="custom-control-label">Buka</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input
                                  type="radio"
                                  class="custom-control-input"
                                  name="store_status"
                                  id="openStoreFalse"
                                  value="0"
                                  {{$user->store_status == 0 || $user->store_status == NULL ? 'checked' : ''}}
                                />
                                <label for="openStoreFalse" class="custom-control-label">Tutup</label>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 mt-4">
                              <button type="submit" class="btn btn-success px-5">Save Now</button>
                            </div>
                          </div>
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
@endpush
