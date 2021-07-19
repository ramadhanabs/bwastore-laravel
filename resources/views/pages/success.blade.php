@extends('layouts.success')

@section('title')
    Success!
@endsection

@section('content')
    <div class="page-content page-success">
      <section class="success-transaction">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center" data-aos="zoom-in" data-aos-delay="100">
              <img src="/images/success-illustration.svg" alt="" class="mb-4" />
              <h2>Transaction Processed!</h2>
              <p>
                Silahkan tunggu konfirmasi email dari kami dan <br />
                kami akan menginformasikan resi secept mungkin!
              </p>
              <div class="mt-2" data-aos="zoom-in" data-aos-delay="200">
                <a href="/dashboard.html" class="btn btn-dashboard text-white w-50 mt-4">My Dashboard</a>
                <a href="/index.html" class="btn btn-index w-50 mt-2">Back to Shopping</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection