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
                                <h3 class="box-title mb-0">Table Peserta Diterima</h3>
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
                                    @foreach ($pesertaTerima as $item)
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
                                                <button class="btn btn-primary text-white btn-circle btn" type="button">
                                                    <i class="fas fa-print"></i>
                                                </button>
                                                    <a href="https://wa.me/{{ $item->telepon }}?text=Hallo%20terima%20kasih%20telah%20mendaftar%20intership%20di%20perusahaan%20kami%20berikut%20balasan%20dari%20pendaftaran%20anda." class="btn btn-success text-white btn-circle btn" target="_blank">
                                                        <i class="fas fa-phone"></i>
                                                    </a>
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
