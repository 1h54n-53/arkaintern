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
                    <form action="{{ route('peserta.update', ['peserta' => $peserta->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama', $peserta->nama) }}" placeholder="Enter full name">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis kelamin</label>
                            <select class="form-select" name="jenis_kelamin" aria-label="Select Gender">
                                <option value="Laki-laki" {{ $peserta->jenis_kelamin === 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $peserta->jenis_kelamin === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telepon">telepon</label>
                            <input type="text" class="form-control" name="telepon" value="{{ old('telepon', $peserta->telepon) }}" placeholder="Masukkan Nomor">
                        </div>
                        <div class="form-group">
                            <label for="telepon">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $peserta->alamat) }}" placeholder="Masukkan alamat">
                        </div>
                        <div class="form-group">
                        <label for="telepon">Institusi</label>
                        <input type="text" class="form-control" name="institusi" value="{{ old('institusi', $peserta->institusi) }}" placeholder="Masukkan alamat">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Surat Pengantar</label>
                            <input type="file" class="form-control" name="surat_pengantar">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">CV</label>
                            <input type="file" class="form-control" name="cv">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Mulai magang</label>
                            <input type="date" class="form-control" name="mulai_magang" value="{{ old('mulai_magang') }}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Selesai magang</label>
                            <input type="date" class="form-control" name="selesai_magang" value="{{ old('selesai_magang') }}">
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