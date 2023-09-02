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
                                <h3 class="box-title mb-0">Table Users</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                    <a href="{{ route('users.create') }}"
                                        class="btn d-grid btn-success text-white">Tambah Users
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Picture</th>
                                            <th class="border-top-0">Username</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Level</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td class="text-center">
                                            <img src="{{ Storage::url('public/image/').$item->picture }}" class="circle" style="width: 75px">
                                        </td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.destroy', ['user' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger text-white">Delete</button>
                                                <a href="{{ route('users.edit', ['user' => $item->id]) }}" class="btn btn-info text-white">Edit</a>
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