<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getData()
    {
        $admin = count(User::where('role', 'admin')->get());
        $mahasiswa = count(User::where('role', 'mahasiswa')->get());
        $dosen = count(User::where('role', 'dosen')->get());

        return response()->json([
            'admin' => $admin,
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen
        ]);
    }
}
