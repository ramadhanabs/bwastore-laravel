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
                        <div class="dashboard-card-subtitle">{{$customer}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Revenue</div>
                        <div class="dashboard-card-subtitle">IDR {{number_format($revenue ?? "0")}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Transaction</div>
                        <div class="dashboard-card-subtitle">{{$transaction_count}}</div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Recent Transaction Content -->
                <div class="row mt-3" data-aos="fade-up" data-aos-delay="400">
                  <div class="col-12 mt-2">
                    <h5 class="mb-3 mt-3">Recent Transactions</h5>
                    @forelse ($transaction_data as $transaction)
                        <a href="{{route('dashboard-transaction-detail',$transaction->id)}}" class="card card-list d-block mt-3">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-1">
                                    <img src="{{Storage::url($transaction->product->galleries->first()->photos)}}" alt="icon1" class="w-100" style="border-radius: 5px"/>
                                </div>
                                <div class="col-md-4">{{$transaction->product->name ?? ''}}</div>
                                <div class="col-md-3">{{$transaction->transaction->user->name ?? ''}}</div>
                                <div class="col-md-3">{{$transaction->created_at ?? ''}}</div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="images/dashboard-arrow-right.svg" alt="iconRight" />
                                </div>
                                </div>
                            </div>
                        </a>
                     @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                                No Transaction Found
                        </div>
                    @endforelse

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
