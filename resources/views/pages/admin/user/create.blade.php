@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@push('addon-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.css"/>
@endpush

@section('content')
    <div class="section-content section-dashboard-home">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Create User</h2>
                <p class="dashboard-subtitle">Here where you create new user</p>
              </div>
              <div class="dashboard-content pt-3">
                  <div class="row">
                      <div class="col-md-12">
                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                         <div class="card">
                             <div class="card-body">
                                <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group store-cart">
                                            <label>Nama User</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group store-cart">
                                            <label>Email User</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group store-cart">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group store-cart">
                                            <label>Roles</label>
                                            <select name="roles" class="form-control" required>
                                                <option value="ADMIN">Admin</option>
                                                <option value="USER">User</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">Save Now</button>
                                    </div>
                                </div>
                                </form>
                             </div>
                         </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
@endsection