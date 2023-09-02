@extends('layouts.admin')
  @section('body')
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
  data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
  <div class="page-wrapper">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label class="font-weight-bold">Username</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="username" value="{{ old('title') }}" placeholder="Masukkan Judul Post">
                            
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">email</label>
                                <input type="email" class="form-control @error('title') is-invalid @enderror" name="email" value="{{ old('title') }}" placeholder="Masukkan Judul Post">
                            
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <div class="col-sm-14">
                                    <select name="role" class="form-select">
                                    <option value="admin">Admin</option>
                                    <option value="institusi">Institusi</option>
                                    <option value="peserta">Peserta</option>
                                    </select>
                                </div>
                                @error('role')
                                    {{ $message }}
                                @enderror
                            
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Password</label>
                                <input type="password" class="form-control @error('title') is-invalid @enderror" name="password" value="{{ old('title') }}" placeholder="Masukkan Judul Post">
                            
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Picture</label>
                                <input type="file" class="form-control @error('picture') is-invalid @enderror" name="picture">
                            
                                <!-- error message untuk title -->
                                @error('picture')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
  @endsection