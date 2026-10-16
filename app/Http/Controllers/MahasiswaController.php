<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa =
            [
                'nim' => '251011700923',
                'nama' => 'Al Khafian',
                'jurusan' => 'Sistem Informasi',
                'email' => 'alKhafiann@gmail.com',
                'kampus' => 'Universitas Pamulang',
                'status' => 'Aktif'

            ];
        return view('page.profile', compact('mahasiswa'));
    }
}
