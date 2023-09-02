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
                                <h3 class="box-title mb-0">Table Institusi</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                    <a href="{{ route('institusi.create') }}"
                                        class="btn d-grid btn-success text-white">Tambah Institusi
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Nama Institusi</th>
                                            <th class="border-top-0">Alamat</th>
                                            <th class="border-top-0">Nama Pebimbing</th>
                                            <th class="border-top-0">Jenis Kelamin</th>
                                            <th class="border-top-0">Telepon</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($institusi as $item)
                                    <tr>
                                        <td>{{ $item->nama_institusi }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->nama_pembimbing }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->telepon }}</td>
                                        <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('institusi.destroy', ['institusi' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger text-white">Delete</button>
                                                <a href="{{ route('institusi.edit', ['institusi' => $item->id]) }}" class="btn btn-info text-white">Edit</a>
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
</body>
@endsection