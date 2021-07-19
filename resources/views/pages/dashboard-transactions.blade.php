@extends('layouts.dashboard')

@section('title')
    Dashboard - My Transactions
@endsection

@section('content')
<div class="section-content section-dashboard-home">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Transactions</h2>
                <p class="dashboard-subtitle">Big result start from the small one</p>
              </div>
              <div class="dashboard-content pt-3">
                <div class="row">
                  <div class="col-12 mt-2">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link active"
                          id="pills-home-tab"
                          data-toggle="pill"
                          href="#pills-home"
                          role="tab"
                          aria-controls="pills-home"
                          aria-selected="true"
                          >Sell Product</a
                        >
                      </li>
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link"
                          id="pills-profile-tab"
                          data-toggle="pill"
                          href="#pills-profile"
                          role="tab"
                          aria-controls="pills-profile"
                          aria-selected="false"
                          >Buy Product</a
                        >
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <div
                        class="tab-pane fade show active"
                        id="pills-home"
                        role="tabpanel"
                        aria-labelledby="pills-home-tab"
                      >
                        <a
                          href="/dashboard-transactions-details.html"
                          class="card card-list d-block mt-3"
                          data-aos="fade-right"
                          data-aos-delay="100"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                <img src="/images/dashboard-icon-product-1.png" alt="icon1" />
                              </div>
                              <div class="col-md-4">Excelso Coffee</div>
                              <div class="col-md-3">Ramadhana Bagus</div>
                              <div class="col-md-3">12 Januari, 2020</div>
                              <div class="col-md-1 d-none d-md-block">
                                <img src="/images/dashboard-arrow-right.svg" alt="iconRight" />
                              </div>
                            </div>
                          </div>
                        </a>
                        <a
                          href="/dashboard-transactions-details.html"
                          class="card card-list d-block mt-3"
                          data-aos="fade-right"
                          data-aos-delay="200"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                <img src="/images/dashboard-icon-product-2.png" alt="icon2" />
                              </div>
                              <div class="col-md-4">Nike Airmax</div>
                              <div class="col-md-3">Evana Stevani</div>
                              <div class="col-md-3">22 Januari, 2020</div>
                              <div class="col-md-1 d-none d-md-block">
                                <img src="/images/dashboard-arrow-right.svg" alt="iconRight" />
                              </div>
                            </div>
                          </div>
                        </a>
                        <a
                          href="/dashboard-transactions-details.html"
                          class="card card-list d-block mt-3"
                          data-aos="fade-right"
                          data-aos-delay="300"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                <img src="/images/dashboard-icon-product-3.png" alt="icon3" />
                              </div>
                              <div class="col-md-4">Sofa Ikea</div>
                              <div class="col-md-3">Bagus Solichuddin</div>
                              <div class="col-md-3">25 Januari, 2020</div>
                              <div class="col-md-1 d-none d-md-block">
                                <img src="/images/dashboard-arrow-right.svg" alt="iconRight" />
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <a href="/dashboard-transactions-details.html" class="card card-list d-block mt-3">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                <img src="/images/dashboard-icon-product-1.png" alt="icon1" />
                              </div>
                              <div class="col-md-4">Starbuck Coffee</div>
                              <div class="col-md-3">Rama Bagus</div>
                              <div class="col-md-3">15 Januari, 2020</div>
                              <div class="col-md-1 d-none d-md-block">
                                <img src="/images/dashboard-arrow-right.svg" alt="iconRight" />
                              </div>
                            </div>
                          </div>
                        </a>
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
@endpush