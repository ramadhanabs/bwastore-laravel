@extends('layouts.app')

@section('title')
    Cart Page
@endsection

@section('content')
    <div class="page-content page-details">
      <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Cart</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-cart">
        <div class="container">
          <div class="row">
            <div class="col-12 table-responsive" data-aos="zoom-in">
              <table class="table table-borderless table-cart" aria-describedby="Cart">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Product's Name & Seller</th>
                    <th scope="col">Price</th>
                    <th scope="col">Menu</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $totalPrice = 0
                    @endphp
                    @foreach ( $carts as $cart)
                        <tr data-aos="fade-up" data-aos-delay="100">
                            <td style="width: 25%">
                                <div class="cart-image">
                                    @if ($cart->product->galleries)
                                        <img src="{{Storage::url($cart->product->galleries->first()->photos)}}" alt="product-1" />
                                    @endif
                                </div>
                            </td>
                            <td style="width: 35%">
                                <div class="title">{{$cart->product->name}}</div>
                                <div class="subtitle">{{$cart->product->user->name}}</div>
                            </td>
                            <td style="width: 35%">
                                <div class="title">{{number_format($cart->product->price)}}</div>
                                <div class="subtitle">IDR</div>
                            </td>
                            <td style="width: 20%">
                            <form action="{{route('cart-delete',$cart->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                                <button type="submit" class="btn btn-remove-item"> Remove </button>
                            </form>
                            </td>
                        </tr>
                        @php
                            $totalPrice += $cart->product->price
                        @endphp
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12 mt-3 mb-4">
              <h5>Shipping Details</h5>
            </div>
          </div>
          {{-- Form Shipping Details --}}
          <form action="" id="locations">
            <div class="row" data-aos="fade-up" data-aos-delay="150">
            {{-- Address 1 --}}
            <div class="col-md-6">
              <div class="form-group">
                <label for="address_one">Address 1</label>
                <input type="text" class="form-control" id="address_one" name="address_one" value="Setra Duta Cemara" />
              </div>
            </div>
            {{-- Address 2 --}}
            <div class="col-md-6">
              <div class="form-group">
                <label for="address_two">Address 2</label>
                <input type="text" class="form-control" id="address_two" name="address_two" value="Blok B2 No. 34" />
              </div>
            </div>
            {{-- Province--}}
            <div class="col-md-4">
              <div class="form-group">
                <label for="provinces_id">Province</label>
                <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                  <option v-for="province in provinces" :value="province.id">@{{province.name}}</option>
                </select>
              </div>
            </div>
            {{-- City/Regency --}}
            <div class="col-md-4">
              <div class="form-group">
                <label for="regencies_id">Regency/City</label>
                <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                  <option v-for="regency in regencies" :value="regency.id">@{{regency.name}}</option>
                </select>
              </div>
            </div>
            {{-- Postal Code --}}
            <div class="col-md-4">
              <div class="form-group">
                <label for="zip_code">Postal Code</label>
                <input type="number" class="form-control" id="zip_code" name="zip_code" value="555184" />
              </div>
            </div>
            {{-- Country --}}
            <div class="col-md-6">
              <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="Indonesia" />
              </div>
            </div>
            {{-- Phone Number --}}
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="number" class="form-control" id="phone_number" name="phone_number" value="082227804252" />
              </div>
            </div>
          </div>
          {{-- Payment Informations --}}
          <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-12 mt-5">
              <h5>Payment Informations</h5>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="250">
            <div class="col-6 col-lg-2 col-sm-6 mt-4">
              <div class="price">$10</div>
              <div class="details">Country Tax</div>
            </div>
            <div class="col-6 col-lg-2 col-sm-6 mt-4">
              <div class="price">$280</div>
              <div class="details">Product Insurance</div>
            </div>
            <div class="col-6 col-lg-2 col-sm-6 mt-4">
              <div class="price">$580</div>
              <div class="details">Ship to Jakarta</div>
            </div>
            <div class="col-6 col-lg-2 col-sm-6 mt-4">
              <div class="price text-success">IDR {{number_format($totalPrice ?? 0)}}</div>
              <div class="details">Total</div>
            </div>
            <div class="col-lg-4">
              <a href="/success.html" class="btn btn-success px-4 mt-4 btn-block">Checkout Now</a>
            </div>
          </div>
          </form>

        </div>
      </section>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var gallery = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvincesData();
          this.getRegenciesData();
        },
        data: {
            provinces: null,
            regencies: null,
            provinces_id: null,
            regencies_id: null,
        },
        methods: {
            getProvincesData(){
                var self = this;
                axios.get('{{route('api-provinces')}}')
                .then(function(response){
                    self.provinces = response.data;
                })
            },
            getRegenciesData(){
                var self = this;
                axios.get('{{url('api/regencies')}}/' + self.provinces_id)
                .then(function(response){
                    self.regencies = response.data;
                })
            },
        },
        watch:{
            provinces_id : function(val, oldVal){
                this.regencies_id = null;
                this.getRegenciesData();
            }
        },
      });
    </script>
@endpush
