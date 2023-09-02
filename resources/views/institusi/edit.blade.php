@extends('layouts.admin')

@section('body')
<body>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
  data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
  <div class="page-wrapper">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('institusi.update', ['institusi' => $institusi->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="nama">Nama Institusi</label>
                            <input type="text" class="form-control" name="nama_institusi" value="{{ old('nama_institusi', $institusi->nama_institusi) }}" placeholder="Masukkan nama institusi">
                        </div>
                        <div class="form-group">
                            <label for="telepon">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $institusi->alamat) }}" placeholder="Masukkan alamat">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pembimbing</label>
                            <input type="text" class="form-control" name="nama_pembimbing" value="{{ old('nama_pembimbing', $institusi->nama_pembimbing) }}" placeholder="Nama Pembimbing">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis kelamin</label>
                            <select class="form-select" name="jenis_kelamin" aria-label="Select Gender">
                                <option value="Laki-laki" {{ $institusi->jenis_kelamin === 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $institusi->jenis_kelamin === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telepon">telepon</label>
                            <input type="text" class="form-control" name="telepon" value="{{ old('telepon', $institusi->telepon) }}" placeholder="Masukkan Nomor">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
@endsection

<script>
    //message with toastr
    @if(session()->has('success'))
    
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        
    @endif
</script>