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
                    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}" placeholder="Enter full name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-select" name="role" aria-label="Select Role">
                                <option value="Admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Institusi" {{ $user->role === 'institusi' ? 'selected' : '' }}>Institusi</option>
                                <option value="Peserta" {{ $user->role === 'peserta' ? 'selected' : '' }}>Peserta</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password', $user->password) }}" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Picture</label>
                            <input type="file" class="form-control" name="picture">
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