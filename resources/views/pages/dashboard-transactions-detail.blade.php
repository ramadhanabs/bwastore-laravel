@extends('layouts.dashboard')

@section('title')
    Dashboard - Transaction Details
@endsection

@section('content')
    <div class="section-content section-dashboard-home">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">#STORE0839</h2>
                <p class="dashboard-subtitle">Transactions / Details</p>
              </div>
              <div class="dashboard-content" id="transactionDetails">
                <div class="row">
                  <div class="col-12 pr-5">
                    <form action="">
                      <div class="card mb-4">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12 col-md-3">
                              <img src="/images/dashboard-product-details.png" alt="" class="w-100 mb-3 details-image" />
                            </div>
                            <div class="col-12 col-md-9 mt-2 px-4">
                              <div class="row">
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Customer Name</div>
                                  <div class="product-subtitle">Ramadhana Bagus</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Product Name</div>
                                  <div class="product-subtitle">Excelso Coffee</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Date of Transaction</div>
                                  <div class="product-subtitle">12 Januari, 2020</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Status</div>
                                  <div class="product-subtitle text-danger">Pending</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Total Amount</div>
                                  <div class="product-subtitle">$16,000</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Phone Number</div>
                                  <div class="product-subtitle">+628 2020 11111</div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <h5 class="mt-4">Shipping Information</h5>
                            </div>
                            <div class="col-md-6 mt-3">
                              <div class="row">
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Address I</div>
                                  <div class="product-subtitle">Setra Duta Cemara</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Address II</div>
                                  <div class="product-subtitle">Blok B2 No. 34</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Province</div>
                                  <div class="product-subtitle">DI Yogyakarta</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">City</div>
                                  <div class="product-subtitle">Bandung</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Postal Code</div>
                                  <div class="product-subtitle">555813</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Country</div>
                                  <div class="product-subtitle">Indonesia</div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 mt-3">
                              <div class="col-12 col-md-6 store-cart">
                                <div class="product-title">Status</div>
                                <select name="status" id="status" class="form-control" v-model="status">
                                  <option value="unpaid">Unpaid</option>
                                  <option value="pending">Pending</option>
                                  <option value="shipping">Shipping</option>
                                  <option value="success">Success</option>
                                </select>
                              </div>
                              <template v-if="status == 'shipping'">
                                <div class="col-12 col-md-6 store-cart mt-3">
                                  <div class="product-title">Input Resi</div>
                                  <input type="text" class="form-control" name="resi" v-model="resi" />
                                  <button class="btn btn-secondary mt-4 d-block">Update Resi</button>
                                </div>
                              </template>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 text-center">
                              <button class="btn btn-success mt-4 w-25">Save Now</button>
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
    <script src="/vendor/vue/vue.js"></script>
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    <script>
      var transactionDetails = new Vue({
        el: "#transactionDetails",
        data: {
          status: "SHIPPING",
          resi: "BSDHS1231231231",
        },
      });
    </script>
@endpush