@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="page-content page-register" id="register">
      <section class="register">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 mt-5">
                <h3>Memulai untuk jual beli dengan cara terbaru</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-4">
                        <label for="name">Full Name</label>
                        <input
                            id="name"
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            autofocus
                            v-model="name"/>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email Address</label>
                        <input
                            id="email"
                            type="email"
                            @change="checkEmail()"
                            class="form-control @error('email') is-invalid @enderror"
                            :class="{'is-invalid':this.email_unavailable}"
                            name="email" value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            v-model="email"
                            />

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input
                            id="password"
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            required
                            autocomplete="new-password"/>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password-confirm">Confirm Password</label>
                        <input
                            id="password-confirm"
                            type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"/>

                        @error('password-confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="name">Add Photo Profile</label>
                        <input
                            id="photo_profile"
                            type="file"
                            name="photo_profile"
                            />
                    </div>
                    <div class="form-group mt-3">
                        <label>Store</label>
                        <p class="text-muted font-weight-light">Apakah anda juga ingin membuka toko?</p>
                        <div class="custom-control custom-radio custom-control-inline">
                        <input
                            type="radio"
                            class="custom-control-input"
                            name="isStoreOpen"
                            id="openStoreTrue"
                            v-model="isStoreOpen"
                            :value="true"
                        />
                        <label for="openStoreTrue" class="custom-control-label">Iya, boleh</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                        <input
                            type="radio"
                            class="custom-control-input"
                            name="isStoreOpen"
                            id="openStoreFalse"
                            v-model="isStoreOpen"
                            :value="false"
                        />
                        <label for="openStoreFalse" class="custom-control-label">Tidak, terima kasih</label>
                        </div>
                    </div>
                    <div class="form-group mt-3" v-if="isStoreOpen">
                        <label>Nama Toko</label>
                        <input
                            type="text"
                            class="form-control @error('email') is-invalid @enderror"
                            id="store_name"
                            name="store_name"
                            v-model="store_name"
                            required
                            autocomplete
                            autofocus/>

                        @error('store_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3" v-if="isStoreOpen">
                        <label for="category">Kategori</label>
                        <select name="categories_id" class="form-control">
                        <option value="" disabled>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <button
                            type="submit"
                            class="btn btn-success btn-block"
                            :disabled="this.email_unavailable">
                            Sign up now
                        </button>
                        <a href="{{route('login')}}" class="btn btn-light btn-block mt-2">Back to sign in</a>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();
        },
        methods: {
            checkEmail: function(){
                var self = this;
                axios.get('{{route('api-register-check')}}',{
                    params: {
                        email: this.email
                    },
                })
                .then(function(response){
                    if(response.data == 'Available'){
                        self.$toasted.show("Email tersedia!", {
                            position: "top-center",
                            className: "rounded",
                            duration: 3000,
                        });

                        self.email_unavailable = false;
                    } else {
                        self.$toasted.error("Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
                            position: "top-center",
                            className: "rounded",
                            duration: 3000,
                        });

                        self.email_unavailable = true;
                    }
                })
            }
        },
        data(){
            return{
                name: "Ramadhana Bagus Solichuddin",
                email: "bagus@mail.com",
                isStoreOpen: true,
                store_name: "",
                email_unavailable: false,
            }
        },
      });
    </script>
@endpush
