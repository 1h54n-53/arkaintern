@extends('layouts.admin')

@section('body')
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-header">
                                    Detail Peserta
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>Nama</th>
                                            <td>{{ $peserta->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>{{ $peserta->jenis_kelamin }}</td>
                                        </tr>
                                        <tr>
                                            <th>No Telepon</th>
                                            <td>{{ $peserta->telepon }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $peserta->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th>Institusi</th>
                                            <td>{{ $peserta->institusi }}</td>
                                        </tr>
                                        <tr>
                                            <th>Surat Pengantar</th>
                                            <td>
                                                <a href="{{ Storage::url($peserta->surat_pengantar) }}" target="_blank">Lihat Surat Pengantar</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>CV</th>
                                            <td>
                                                <a href="{{ Storage::url($peserta->cv) }}" target="_blank">Lihat CV</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Mulai Magang</th>
                                            <td>{{ $peserta->mulai_magang }}</td>
                                        </tr>
                                        <tr>
                                            <th>Selesai Magang</th>
                                            <td>{{ $peserta->selesai_magang }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('terima', ['id' => $peserta->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success text-white">Terima</button>
                                    </form>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tolak', ['id' => $peserta->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger text-white">Tolak</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
