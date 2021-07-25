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
                    <form action="{{route('dashboard-setting-redirect','dashboard-account-setting')}}" method="POST" enctype="multipart/form-data" id="locations">
                        @csrf
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
                                  value="{{$user->name}}"
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
                                  value="{{$user->email}}"
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
                                  name="address_one"
                                  value="{{$user->address_one}}"
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
                                  name="address_two"
                                  value="{{$user->address_two}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group store-cart">
                                <label for="province">Province</label>
                                <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                                    <option v-for="province in provinces" :value="province.id">@{{province.name}}</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group store-cart">
                                <label for="city">City</label>
                                <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                                    <option v-for="regency in regencies" :value="regency.id">@{{regency.name}}</option>
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
                                  name="zip_code"
                                  value="{{$user->zip_code}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group store-cart">
                                <label for="country">Country</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="country"
                                  value="{{$user->country}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group store-cart">
                                <label for="phoneNumber">Phone Number</label>
                                <input
                                  type="number"
                                  class="form-control"
                                  id="phoneNumber"
                                  name="phone_number"
                                  value="{{$user->phone_number}}"
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
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
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
