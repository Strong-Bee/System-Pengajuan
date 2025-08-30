@extends('superadmin.index')
@section('isi')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">{{ $halaman }}</h1>

                <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                    <div class="inner">
                        <div class="app-card-body p-3 p-lg-4">
                            <h3 class="mb-3">Welcome, {{ Auth::user()->name }}!</h3>
                            <div class="row gx-5 gy-3">
                                <div class="col-12 col-lg-9">
                                    @if (Auth::user()->role === 'Super Admin')
                                        <div>You are logged in as <strong>Super Admin</strong>. You can manage all users and
                                            system settings.</div>
                                    @elseif(Auth::user()->role === 'Admin')
                                        <div>You are logged in as <strong>Admin</strong>. You can manage Karyawan data and
                                            monitor reports.</div>
                                    @else
                                        <div>Welcome <strong>Karyawan</strong>! You can submit your tasks, view reports, and
                                            manage your profile.</div>
                                    @endif
                                </div>
                                <div class="col-12 col-lg-3">
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>


                <div class="row g-4 mb-4">
                    <!-- Total Karyawan -->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Karyawan</h4>
                                <div class="stats-figure">{{ $totalKaryawan ?? 0 }}</div>
                                <div class="stats-meta text-primary">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5 3a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm0 1a2 2 0 1 0 4 0 2 2 0 0 0-4 0z" />
                                        <path fill-rule="evenodd" d="M2 13s-1 0-1-1 1-4 7-4 7 3 7 4-1 1-1 1H2z" />
                                    </svg>
                                </div>
                            </div>
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                    </div>

                    <!-- Total Pengajuan -->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Pengajuan</h4>
                                <div class="stats-figure">{{ $totalPengajuan ?? 0 }}</div>
                                <div class="stats-meta text-info">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-text"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5 10.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                        <path fill-rule="evenodd"
                                            d="M14 4.5V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h7.5L14 4.5z" />
                                    </svg>
                                </div>
                            </div>
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                    </div>

                    <!-- Pengajuan Disetujui -->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Disetujui</h4>
                                <div class="stats-figure">{{ $disetujui ?? 0 }}</div>
                                <div class="stats-meta text-success">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm3.354-8.354a.5.5 0 0 1 0 .708L8.707 10.707a.5.5 0 0 1-.708 0L4.646 7.354a.5.5 0 1 1 .708-.708L8 9.293l3.354-3.353a.5.5 0 0 1 .708 0z" />
                                    </svg>
                                </div>
                            </div>
                            <a class="app-card-link-mask" href=""></a>
                        </div>
                    </div>

                    <!-- Pengajuan Ditolak -->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Ditolak</h4>
                                <div class="stats-figure">{{ $ditolak ?? 0 }}</div>
                                <div class="stats-meta text-danger">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm3.354-8.354a.5.5 0 0 1 0 .708L8.707 10.707a.5.5 0 0 1-.708 0L4.646 7.354a.5.5 0 1 1 .708-.708L8 9.293l3.354-3.353a.5.5 0 0 1 .708 0z" />
                                    </svg>
                                </div>
                            </div>
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
