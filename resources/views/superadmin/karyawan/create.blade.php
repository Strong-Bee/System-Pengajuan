@extends('superadmin.index')
@section('isi')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">{{ $halaman }}</h1>

                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('superadmin.karyawan.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" name="role">
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Karyawan" selected>Karyawan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="Active" selected>Active</option>
                                    <option value="Non-Active">Non-Active</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Karyawan</button>
                            <a href="{{ route('superadmin.karyawan.index') }}" class="btn btn-secondary">Cancel</a>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
