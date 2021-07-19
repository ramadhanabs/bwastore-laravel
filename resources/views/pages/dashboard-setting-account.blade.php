@extends('layouts.dashboard')

@section('title')
    Dashboard - Store Setting
@endsection

@section('content')
    <div class="section-content section-dashboard-home">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">Update your current profile</p>
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
                                <label for="name">Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  aria-describedby="emailHelp"
                                  name="name"
                                  value="Ramadhana Bagus"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group store-cart">
                                <label for="email">Email Address</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  aria-describedby="emailHelp"
                                  name="email"
                                  value="ramadhan@gmail.com"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group store-cart">
                                <label for="address1">Address 1</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="address1"
                                  aria-describedby="emailHelp"
                                  name="address1"
                                  value="Papel La Casa"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group store-cart">
                                <label for="address2">Address 2</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="address2"
                                  aria-describedby="emailHelp"
                                  name="address2"
                                  value="Blok B2 No. 34"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group store-cart">
                                <label for="province">Province</label>
                                <select name="province" id="province" class="form-control" value="DI Yogyakarta">
                                  <option value="#">DI Yogyakarta</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group store-cart">
                                <label for="city">City</label>
                                <select name="city" id="city" class="form-control" value="Sleman">
                                  <option value="#">Sleman</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group store-cart">
                                <label for="postalCode">Postal Code</label>
                                <input
                                  type="number"
                                  class="form-control"
                                  id="postalCode"
                                  name="postalCode"
                                  value="555814"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group store-cart">
                                <label for="country">Country</label>
                                <select name="country" id="country" class="form-control" value="Indonesia">
                                  <option value="#">Indonesia</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group store-cart">
                                <label for="phoneNumber">Phone Nummber</label>
                                <input
                                  type="number"
                                  class="form-control"
                                  id="phoneNumber"
                                  name="phoneNumber"
                                  value="082227804252"
                                />
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