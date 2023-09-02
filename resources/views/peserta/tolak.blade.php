@extends('layouts.admin')

@section('body')
<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Table Peserta Ditolak</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Nama</th>
                                            <th class="border-top-0">Gender</th>
                                            <th class="border-top-0">Telepon</th>
                                            <th class="border-top-0">Alamat</th>
                                            <th class="border-top-0">Mulai Magang</th>
                                            <th class="border-top-0">Selesai Magang</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($pesertaTolak as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->telepon }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->mulai_magang }}</td>
                                        <td>{{ $item->selesai_magang }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('peserta.destroy', ['peserta' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger text-white">Delete</button>
                                                <a href="{{ route('peserta.edit', ['peserta' => $item->id]) }}" class="btn btn-info text-white">Edit</a>
                                                <a href="{{ route('peserta.detail', ['id' => $item->id]) }}" class="btn btn-primary text-white">View</a>
                                            </form>                                      
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
@endsection
