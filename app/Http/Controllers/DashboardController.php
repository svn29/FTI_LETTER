<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\SuratDaftarHadir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role != 'admin') {
            $pribadis = Surat::where('jenis_surat', 'tugas pribadi')->where('pemohon_id', Auth::user()->id)->get();
            $kelompoks = Surat::where('jenis_surat', 'tugas kelompok')->where('pemohon_id', Auth::user()->id)->get();
            $dosens = Surat::where('jenis_surat', 'tugas dosen')->where('pemohon_id', Auth::user()->id)->get();
            $acaras = Surat::where('jenis_surat', 'berita acara')->where('pemohon_id', Auth::user()->id)->get();

            return view('welcome', compact('pribadis', 'kelompoks', 'dosens', 'acaras'));
        }else{
            $pribadis = Surat::where('jenis_surat', 'tugas pribadi')->get();
            $kelompoks = Surat::where('jenis_surat', 'tugas kelompok')->get();
            $dosens = Surat::where('jenis_surat', 'tugas dosen')->get();
            $acaras = Surat::where('jenis_surat', 'berita acara')->get();
            $hadirs = SuratDaftarHadir::all();

            return view('welcome', compact('pribadis', 'kelompoks', 'dosens', 'acaras', 'hadirs'));
        }
        // return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
