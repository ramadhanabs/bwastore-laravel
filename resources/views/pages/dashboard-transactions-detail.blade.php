@extends('layouts.dashboard')

@section('title')
    Dashboard - Transaction Details
@endsection

@section('content')
    <div class="section-content section-dashboard-home">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">{{$transaction->code}}</h2>
                <p class="dashboard-subtitle">Transactions / Details</p>
              </div>
              <div class="dashboard-content" id="transactionDetails">
                <div class="row">
                  <div class="col-12 pr-5">
                      <div class="card mb-4">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12 col-md-3">
                              <img src="{{Storage::url($transaction->product->galleries->first()->photos)}}" alt="" class="w-100 mb-3 details-image"  style="border-radius:10px"/>
                            </div>
                            <div class="col-12 col-md-9 mt-2 px-4">
                              <div class="row">
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Customer Name</div>
                                  <div class="product-subtitle">{{$transaction->transaction->user->name}}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Product Name</div>
                                  <div class="product-subtitle">{{$transaction->product->name}}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Date of Transaction</div>
                                  <div class="product-subtitle">{{date_format($transaction->created_at, "d F Y")}}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Status</div>
                                  <div class="product-subtitle text-danger" id="shippingStatus">{{$transaction->shipping_status}}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Total Amount</div>
                                  <div class="product-subtitle">IDR {{number_format($transaction->product->price)}}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                  <div class="product-title">Phone Number</div>
                                  <div class="product-subtitle">{{$transaction->transaction->user->phone_number}}</div>
                                </div>
                              </div>
                            </div>
                          </div>
                            <form action="{{route('dashboard-transaction-update', $transaction->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                <h5 class="mt-4">Shipping Information</h5>
                                </div>
                                <div class="col-md-6 mt-3">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                    <div class="product-title">Address I</div>
                                    <div class="product-subtitle">{{$transaction->transaction->user->address_one}}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <div class="product-title">Address II</div>
                                    <div class="product-subtitle">{{$transaction->transaction->user->address_two}}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <div class="product-title">Province</div>
                                    <div class="product-subtitle">{{
                                        App\Models\Province::find($transaction->transaction->user->provinces_id)->name;
                                    }}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <div class="product-title">City</div>
                                    <div class="product-subtitle">{{
                                        App\Models\Regency::find($transaction->transaction->user->regencies_id)->name;
                                    }}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <div class="product-title">Postasl Code</div>
                                    <div class="product-subtitle">{{$transaction->transaction->user->zip_code}}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    <div class="product-title">Country</div>
                                    <div class="product-subtitle">{{$transaction->transaction->user->country}}</div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                <div class="col-12 col-md-6 store-cart">
                                    <div class="product-title">Status</div>
                                    <select name="shipping_status" id="status" class="form-control" v-model="status">
                                        <option value="UNPAID">Unpaid</option>
                                        <option value="PENDING">Pending</option>
                                        <option value="SHIPPING">Shipping</option>
                                        <option value="SUCCESS">Success</option>
                                    </select>
                                </div>
                                <template v-if="status == 'SHIPPING'">
                                    <div class="col-12 col-md-6 store-cart mt-3">
                                    <div class="product-title">Input Resi</div>
                                    <input type="text" class="form-control" name="resi" v-model="resi" />
                                    <button type="submit" class="btn btn-secondary mt-4 d-block">Update Resi</button>
                                    </div>
                                </template>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success mt-4 w-25">Save Now</button>
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
          status: "{{$transaction->shipping_status}}",
          resi: "{{$transaction->resi}}",
        },
      });
    </script>
    <script>
        let status = document.getElementById('shippingStatus').innerHTML;
        console.log(status);
        if(status == "SUCCESS"){
            document.getElementById("shippingStatus").classList.remove('text-danger');
            document.getElementById("shippingStatus").classList.add('text-success');
        }
    </script>
@endpush
