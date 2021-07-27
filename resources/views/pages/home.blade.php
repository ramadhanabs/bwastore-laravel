@extends('layouts.app')

@section('title')
    Store Homepage
@endsection

@section('content')
    <div class="page-content page-home">
      <section class="store-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div id="storeCarousel" class="carousel slide" data-aos="zoom-in" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li class="active" data-target="#storeCarousel" data-slide-to="0"></li>
                  <li data-target="#storeCarousel" data-slide-to="1"></li>
                  <li data-target="#storeCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/images/banner.jpg" alt="Carousel Image" class="d-block w-100" />
                  </div>
                  <div class="carousel-item">
                    <img src="/images/banner.jpg" alt="Carousel Image" class="d-block w-100" />
                  </div>
                  <div class="carousel-item">
                    <img src="/images/banner.jpg" alt="Carousel Image" class="d-block w-100" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12 mb-1" data-aos="fade-up">
              <h5>Trend Categories</h5>
            </div>
          </div>
          <div class="row">
              @php
                  $incrementCategory = 0;
              @endphp
              @forelse ($categories as $category)
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{$incrementCategory += 100}}">
                    <a href="{{route('categories-detail', $category->slug)}}" class="component-categories d-block">
                        <div class="categories-image" style="text-align: center">
                            <img src="{{Storage::url($category->photo)}}" alt="icon-gadget" class="w-50" style="text-align: center"/>
                            <p class="categories-text">{{$category->name}}</p>
                        </div>
                    </a>
                 </div>
              @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                     No Categories Found
                </div>
              @endforelse
          </div>
        </div>
      </section>

      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>New Products</h5>
            </div>
          </div>
          <div class="row">
              @php
                  $incrementCategory = 0;
              @endphp
              @forelse ($products as $product)
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{$incrementCategory += 100}}">
                    <a href="{{route("details", $product->slug)}}" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                                @if ($product->galleries->count())
                                    background-image: url('{{Storage::url($product->galleries->first()->photos)}}')
                                @else
                                    background-color: #eee
                                @endif
                                "></div>
                        </div>
                        @php
                            $nameProduct = number_format($product->price);
                        @endphp
                        <div class="products-text">{{$product->name}}</div>
                        <div class="products-price">IDR {{$nameProduct}}</div>
                    </a>
                </div>
              @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                     No Categories Found
                </div>
              @endforelse
          </div>
        </div>
      </section>
    </div>
@endsection


