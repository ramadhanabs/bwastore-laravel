<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    {{-- Style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- sidebar -->
        @include('includes.sidebar-dashboard')

        <!-- page content -->
        <div id="page-content-wrapper">
            {{-- Navbar Dashboard --}}
            @include('includes.navbar-dashboard')
            
            {{-- Content Dashboard --}}
            @yield('content')
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
  </body>
</html>
