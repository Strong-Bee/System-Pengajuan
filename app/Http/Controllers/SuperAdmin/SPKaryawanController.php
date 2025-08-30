<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\LogAktivitas;
use App\Models\Notifikasi;

class SPKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data =
            [
                'halaman' => 'Karyawan',
                'title' => 'Karyawan',
                'karyawan' =>  User::all()
            ];
        return view('superadmin.karyawan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = [
            'halaman' => 'Karyawan',
            'title' => 'Create Karyawan',
        ];
        return view('superadmin.karyawan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Ambil data karyawan berdasarkan id
        $karyawan = User::find($id);

        if (!$karyawan) {
            // Jika karyawan tidak ditemukan, redirect dengan pesan error
            return redirect()->route('superadmin.karyawan.index')->with('error', 'Karyawan tidak ditemukan.');
        }

        $data = [
            'halaman' => 'Karyawan',
            'title' => 'Edit Karyawan',
            'karyawan' => $karyawan
        ];

        return view('superadmin.karyawan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
