@extends('superadmin.index')
@section('isi')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">{{ $halaman }}</h1>

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="app-card app-card-settings shadow-sm p-4">
                    <form action="{{ route('superadmin.karyawan.update', $karyawan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $karyawan->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', $karyawan->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password <small>(kosongkan jika tidak
                                    diubah)</small></label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select" required>
                                <option value="Super Admin" {{ $karyawan->role == 'Super Admin' ? 'selected' : '' }}>Super
                                    Admin</option>
                                <option value="Admin" {{ $karyawan->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Karyawan" {{ $karyawan->role == 'Karyawan' ? 'selected' : '' }}>Karyawan
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="Active" {{ $karyawan->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Non-Active" {{ $karyawan->status == 'Non-Active' ? 'selected' : '' }}>
                                    Non-Active</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Karyawan</button>
                        <a href="{{ route('superadmin.karyawan.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
