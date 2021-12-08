<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class TugasKelompokController extends Controller
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
        if (Auth::user()->role == 'mahasiswa') {
            $surats = Surat::where('jenis_surat', 'tugas kelompok')->where('pemohon_id', Auth::user()->id)->paginate(5);
        } else {
            $surats = Surat::where('jenis_surat', 'tugas kelompok')->paginate(5);
        }

        return view('tugas_kelompok.index', compact('surats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role', 'mahasiswa')->get();
        return view('tugas_kelompok.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $surat = Surat::create([
            'pemohon_id' => $request->pemohon_id,
            'status' => $request->status,
            'jenis_surat' => $request->jenis_surat,
            'judul' => $request->judul,
            'nama_mitra' => $request->nama_mitra,
            'tanggal' => $request->tanggal,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'kepada' => $request->kepada
        ]);

        $surat->penerimas()->sync(request('penerimas'));
        // dd($request);

        return redirect()->route('tugas_kelompok.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $surat = Surat::find($id);

        // return view('tugas_kelompok.edit', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat = Surat::find($id);
        $users = User::where('role', 'mahasiswa')->get();

        return view('tugas_kelompok.edit', compact('surat', 'users'));
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
        $surat = Surat::find($id);
        
        $surat->update([
            'pemohon_id' => $request->pemohon_id,
            'status' => $request->status,
            'jenis_surat' => $request->jenis_surat,
            'judul' => $request->judul,
            'nama_mitra' => $request->nama_mitra,
            'tanggal' => $request->tanggal,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'kepada' => $request->kepada,
            'status' => $request->status
        ]);

        $surat->penerimas()->sync(request('penerimas'));
        // dd(Surat::find($id)->penerimas);
        // dd($request);

        return redirect()->route('tugas_kelompok.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Surat::find($id)->delete();

        return redirect()->back();
    }

    public function showValidasi($id)
    {
        $surat = Surat::find($id);
        $signs = Sign::all();
        return view('tugas_kelompok.validasi', compact('surat', 'signs'));
    }

    public function takenValidasi(Request $request,$id)
    {
        if ($request->status == 'diterima') {
            
            $year = date('Y');
            $len = strlen($id);

            if ($len == 1) {
                $kode = '00' . (string)$id;
            }else if($len == 2){
                $kode = '0' . (string)$id;
            }else{
                $kode = (string)$id;
            }

            Surat::find($id)->update([
                'no_surat' => $kode.'/B/FTI/'. $year,
                'status' => $request->status,
                'sign_id' => $request->sign_id
            ]);

            // file_put_contents(public_path('upload/') . $name, $image_base64);

            return redirect()->route('tugas_kelompok.index')->with('success', 'success Full upload signature');
        }else{
            Surat::find($id)->update([
                'status' => $request->status,
            ]);

            return redirect()->route('tugas_kelompok.index')->with('success', 'success Full upload signature');
        }
    }

    public function download($id)
    {
        $item = Surat::find($id);
        $pdf = PDF::loadview('pdf.tugas_kelompok',compact('item'));
    	return $pdf->stream();
    }
}
