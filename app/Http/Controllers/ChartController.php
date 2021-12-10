<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\SuratDaftarHadir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function getData()
    {
        if (Auth::user()->role == 'mahasiswa') {
            $pribadis = count(Surat::where('jenis_surat', 'tugas pribadi')->where('pemohon_id', Auth::user()->id)->get());
            $kelompoks = count(Surat::where('jenis_surat', 'tugas kelompok')->where('pemohon_id', Auth::user()->id)->get());
            // $dosens = count(Surat::where('jenis_surat', 'tugas dosen')->get());

            return response()->json([
                'pribadis' => $pribadis,
                'kelompoks' => $kelompoks,
            ]);
        }else if(Auth::user()->role == 'dosen'){
            $acaras = count(Surat::where('jenis_surat', 'berita acara')->where('pemohon_id', Auth::user()->id)->get());
            $dosens = count(Surat::where('jenis_surat', 'tugas dosen')->where('pemohon_id', Auth::user()->id)->get());

            return response()->json([
                'acaras' => $acaras,
                'dosens' => $dosens,
            ]);
        }else{
            $pribadis = count(Surat::where('jenis_surat', 'tugas pribadi')->get());
            $kelompoks = count(Surat::where('jenis_surat', 'tugas kelompok')->get());
            $dosens = count(Surat::where('jenis_surat', 'tugas dosen')->get());
            $acaras = count(Surat::where('jenis_surat', 'berita acara')->get());
            $hadirs = count(SuratDaftarHadir::all());
    
            return response()->json([
                'pribadis' => $pribadis,
                'kelompoks' => $kelompoks,
                'dosens' => $dosens,
                'acaras' => $acaras,
                'hadirs' => $hadirs
            ]);
        }
    }
}
