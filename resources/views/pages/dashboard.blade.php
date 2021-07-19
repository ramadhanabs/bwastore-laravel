@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="section-content section-dashboard-home">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">Look what you have made today!</p>
              </div>
              <div class="dashboard-content pt-3">
                <!-- Summary Content -->
                <div class="row">
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Customer</div>
                        <div class="dashboard-card-subtitle">15,209</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Revenue</div>
                        <div class="dashboard-card-subtitle">$931,290</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Transaction</div>
                        <div class="dashboard-card-subtitle">22,409,399</div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Recent Transaction Content -->
                <div class="row mt-3" data-aos="fade-up" data-aos-delay="400">
                  <div class="col-12 mt-2">
                    <h5 class="mb-3 mt-3">Recent Transactions</h5>
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block mt-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img src="images/dashboard-icon-product-1.png" alt="icon1" />
                          </div>
                          <div class="col-md-4">Excelso Coffee</div>
                          <div class="col-md-3">Ramadhana Bagus</div>
                          <div class="col-md-3">12 Januari, 2020</div>
                          <div class="col-md-1 d-none d-md-block">
                            <img src="images/dashboard-arrow-right.svg" alt="iconRight" />
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block mt-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img src="images/dashboard-icon-product-2.png" alt="icon2" />
                          </div>
                          <div class="col-md-4">Nike Airmax</div>
                          <div class="col-md-3">Evana Stevani</div>
                          <div class="col-md-3">22 Januari, 2020</div>
                          <div class="col-md-1 d-none d-md-block">
                            <img src="images/dashboard-arrow-right.svg" alt="iconRight" />
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block mt-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img src="images/dashboard-icon-product-3.png" alt="icon3" />
                          </div>
                          <div class="col-md-4">Sofa Ikea</div>
                          <div class="col-md-3">Bagus Solichuddin</div>
                          <div class="col-md-3">25 Januari, 2020</div>
                          <div class="col-md-1 d-none d-md-block">
                            <img src="images/dashboard-arrow-right.svg" alt="iconRight" />
                          </div>
                        </div>
                      </div>
                    </a>
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