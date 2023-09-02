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
                                <h3 class="box-title mb-0">Table Absensi</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">latitude</th>
                                            <th class="border-top-0">longitude</th>
                                            <th class="border-top-0">Tanggal</th>
                                            <th class="border-top-0">Masuk</th>
                                            <th class="border-top-0">Pulang</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
        </div>
    </div>
</body>
@endsection