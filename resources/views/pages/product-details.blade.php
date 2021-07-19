@extends('layouts.app')

@section('title')
    Store Details Page
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
                    <a href="/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Product Details</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-gallery" id="gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-8" data-aos="zoom-in">
              <transition name="slide-fade" mode="out-in">
                <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" alt="" class="w-100 main-image" />
              </transition>
            </div>
            <div class="col-lg-2">
              <div class="row">
                <div
                  class="col-3 col-lg-12 mt-2 mt-lg-0 thumbnail-body"
                  v-for="(photo, index) in photos"
                  :key="photo.id"
                  data-aos="zoom-in"
                  data-aos-delay="100"
                >
                  <a href="#" @click="changeActive(index)">
                    <img
                      :src="photo.url"
                      class="w-100 thumbnail-image"
                      :class="{active: index == activePhoto}"
                      alt=""
                    />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="store-details-container mt-3">
        <section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8" data-aos="fade-right" data-aos-delay="100">
                <h1>{{$product->name}}</h1>
                <div class="owner">{{$product->user->name}}</div>
                <div class="price">IDR {{number_format($product->price)}}</div>
              </div>
              <div class="col-lg-2" data-aos="zoom-in" data-aos-delay="200">
                    @auth
                        <form action="{{route('details-add', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <button type="submit" class="btn btn-success nav-link px-4 text-white btn-block mt-3 mb-3"> Add to Cart </button>
                        </form>
                    @else
                        <a href="{{route('login')}}" class="btn btn-secondary nav-link px-4 text-white btn-block mt-3 mb-3"> Sign in to add </a>
                    @endauth
              </div>
            </div>
          </div>
        </section>

        <section class="store-description mt-3">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8" data-aos="fade-up">
                {!! $product->description !!}
              </div>
            </div>
          </div>
        </section>

        <section class="store-customer-review mt-3">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 mt-3" data-aos="fade-up" data-aos-delay="100">
                <h5>Customer Review (3)</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-8">
                <ul class="list-unstyled">
                  <li class="media" data-aos="fade-up" data-aos-delay="200">
                    <img src="/images/avatar-3.png" alt="" class="mr-3 rounded-circle">
                    <div class="media-body">
                      <h6 class="mt-2 mb-1">Raja Siahaan</h6>
                      I really happy to decided buy this product last week now feels like
                      racer.
                    </div>
                  </li>
                  <li class="media" data-aos="fade-up" data-aos-delay="300">
                    <img src="/images/avatar-2.png" alt="" class="mr-3 rounded-circle">
                    <div class="media-body">
                      <h6 class="mt-2 mb-1">Ratu Situmbolon</h6>
                      When I saw at first, it was really awesome to have with. Just let me know if there is another upcoming product like this.
                    </div>
                  </li>
                  <li class="media" data-aos="fade-up" data-aos-delay="400">
                    <img src="/images/avatar-1.png" alt="" class="mr-3 rounded-circle">
                    <div class="media-body">
                      <h6 class="mt-2 mb-1">Putri Siahaan</h6>
                      I love this car!
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            </div>
          </div>
        </section>
      </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
              @foreach ($product->galleries as $photo)
                {
                    id: {{$photo->id}},
                    url: "{{Storage::url($photo->photos)}}",
                },
              @endforeach

          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
@endpush
