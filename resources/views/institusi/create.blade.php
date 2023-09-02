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
                        <form action="{{ route('institusi.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Institusi</label>
                                <input type="text" class="form-control @error('nama_institusi') is-invalid @enderror" name="nama_institusi" value="{{ old('nama_institusi') }}" placeholder="Masukkan Nama_institusi">
                                
                                <!-- error message untuk nama -->
                                @error('nama_institusi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat">
                                
                                <!-- error message untuk alamat -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Pebimbing</label>
                                <input type="text" class="form-control @error('nama_pembimbing') is-invalid @enderror" name="nama_pembimbing" value="{{ old('nama_pembimbing') }}" placeholder="Masukkan Nama Pembimbing">
                                
                                <!-- error message untuk nama -->
                                @error('nama_institusi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis kelamin</label>
                                <div class="col-sm-14">
                                    <select name="jenis_kelamin" class="form-select">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <!-- error message untuk jenis_kelamin -->
                                @error('jenis_kelamin')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">No Telepon</label>
                                <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" placeholder="Masukkan Nomor Anda">
                                
                                <!-- error message untuk telepon -->
                                @error('telepon')
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