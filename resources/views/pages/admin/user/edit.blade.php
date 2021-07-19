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
                <h2 class="dashboard-title">Edit User</h2>
                <p class="dashboard-subtitle">Here where you edit your user</p>
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
                                <form action="{{route('user.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group store-cart">
                                            <label>Nama User</label>
                                            <input type="text" name="name" class="form-control" value="{{$item->name}}"required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group store-cart">
                                            <label>Email User</label>
                                            <input type="email" name="email" class="form-control" value="{{$item->email}}"" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group store-cart">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                            <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group store-cart">
                                            <label>Roles</label>
                                            <select name="roles" class="form-control" required>
                                                <option value="{{$item->roles}}" selected>{{$item->roles}}</option>
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