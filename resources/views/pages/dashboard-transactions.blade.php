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
                      @forelse ($sell_transactions as $item)
                        <a
                          href="{{route('dashboard-transaction-detail',$item->id)}}"
                          class="card card-list d-block mt-3"
                          data-aos="fade-right"
                          data-aos-delay="100"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                <img src="{{Storage::url($item->product->galleries->first()->photos ?? '')}}" alt="icon1" class="w-100" style="border-radius:5px"/>
                              </div>
                              <div class="col-md-4">{{$item->product->name}}</div>
                              <div class="col-md-3">{{$item->transaction->user->name}}</div>
                              <div class="col-md-3">{{date_format($item->created_at, "d F Y, H:i")}}</div>
                              <div class="col-md-1 d-none d-md-block">
                                <img src="/images/dashboard-arrow-right.svg" alt="iconRight" />
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
                      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                          @forelse ($buy_transactions as $item)
                            <a href="{{route('dashboard-transaction-detail',$item->id)}}" class="card card-list d-block mt-3">
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-1">
                                        <img src="{{Storage::url($item->product->galleries->first()->photos ?? '')}}" class="w-100" style="border-radius:5px" />
                                    </div>
                                    <div class="col-md-4">{{$item->product->name}}</div>
                                    <div class="col-md-3">{{$item->product->user->name}}</div>
                                    <div class="col-md-3">{{$item->created_at}}</div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="/images/dashboard-arrow-right.svg" alt="iconRight" />
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
