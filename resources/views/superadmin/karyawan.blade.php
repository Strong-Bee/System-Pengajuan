@extends('superadmin.index')
@section('isi')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">{{ $halaman }}</h1>
                <a class="btn btn-primary text-white" href="{{ route('superadmin.karyawan.create') }}">+ Create Karyawan</a>
                <!-- Utilities: Search, Filter, Download -->
                <div class="col-auto mb-3">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center" method="GET" action="">
                                    <div class="col-auto">
                                        <input type="text" name="search" class="form-control search-orders"
                                            placeholder="Search" value="{{ request('search') }}">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-auto">
                                <select class="form-select w-auto" onchange="this.form.submit()">
                                    <option value="" {{ request('filter') == '' ? 'selected' : '' }}>All</option>
                                    <option value="this_week" {{ request('filter') == 'this_week' ? 'selected' : '' }}>This
                                        week</option>
                                    <option value="this_month" {{ request('filter') == 'this_month' ? 'selected' : '' }}>
                                        This month</option>
                                    <option value="last_3_months"
                                        {{ request('filter') == 'last_3_months' ? 'selected' : '' }}>Last 3 months</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                {{-- <a class="btn app-btn-secondary" href="{{ route('superadmin.karyawan.export') }}">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                        <path fill-rule="evenodd"
                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                    </svg>
                                    Download CSV
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs -->
                <nav class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link active" id="tab-all" data-bs-toggle="tab"
                        href="#tab-all-content">All</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="tab-active" data-bs-toggle="tab"
                        href="#tab-active-content">Active</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="tab-inactive" data-bs-toggle="tab"
                        href="#tab-inactive-content">Inactive</a>
                </nav>

                <!-- Tab Content -->
                <div class="tab-content" id="tab-content">
                    <!-- All Karyawan -->
                    <div class="tab-pane fade show active" id="tab-all-content">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">#</th>
                                                <th class="cell">Nama</th>
                                                <th class="cell">Email</th>
                                                <th class="cell">Role</th>
                                                <th class="cell">Status</th>
                                                <th class="cell">Dibuat</th>
                                                <th class="cell"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($karyawan as $index => $row)
                                                <tr>
                                                    <td class="cell">{{ $index + 1 }}</td>
                                                    <td class="cell">{{ $row->name }}</td>
                                                    <td class="cell">{{ $row->email }}</td>
                                                    <td class="cell">{{ $row->role }}</td>
                                                    <td class="cell">
                                                        <span
                                                            class="badge {{ $row->status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $row->status }}
                                                        </span>
                                                    </td>
                                                    <td class="cell">{{ $row->created_at->format('d-m-Y') }}</td>
                                                    <td class="cell">
                                                        <a class="btn-sm app-btn-secondary"
                                                            href="{{ route('superadmin.karyawan.edit', $row->id) }}">Edit</a>
                                                        <form action="{{ route('superadmin.karyawan.destroy', $row->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-sm app-btn-secondary"
                                                                onclick="return confirm('Yakin hapus karyawan ini?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if ($karyawan->isEmpty())
                                        <p class="text-center mt-3">Data karyawan masih kosong.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <!-- Active Karyawan -->
                    <div class="tab-pane fade" id="tab-active-content">
                        @include('superadmin.karyawan.tab', [
                            'karyawan' => $karyawan->where('status', 'Active'),
                        ])
                    </div>

                    <!-- Inactive Karyawan -->
                    <div class="tab-pane fade" id="tab-inactive-content">
                        @include('superadmin.karyawan.tab', [
                            'karyawan' => $karyawan->where('status', 'Inactive'),
                        ])
                    </div> --}}

                </div>

            </div>
        </div>
    </div>
@endsection
