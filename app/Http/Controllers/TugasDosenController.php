<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class TugasDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'dosen') {
            $surats = Surat::where('jenis_surat', 'tugas dosen')->where('pemohon_id', Auth::user()->id)->get();
        } else {
            $surats = Surat::where('jenis_surat', 'tugas dosen')->get();
        }

        return view('tugas_dosen.index', compact('surats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tugas_dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Surat::create($request->all());

        return redirect()->route('tugas_dosen.index');
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
        $surat = Surat::find($id);

        return view('tugas_dosen.edit', compact('surat'));
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
        Surat::find($id)->update($request->all());

        return redirect()->route('tugas_dosen.index');
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
        return view('tugas_dosen.validasi', compact('surat', 'signs'));
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
                'no_surat' => $kode.'/C/FTI/'. $year,
                'status' => $request->status,
                'sign_id' => $request->sign_id
            ]);

            // file_put_contents(public_path('upload/') . $name, $image_base64);

            return redirect()->route('tugas_dosen.index')->with('success', 'success Full upload signature');
        }else{
            Surat::find($id)->update([
                'status' => $request->status,
            ]);

            return redirect()->route('tugas_dosen.index')->with('success', 'success Full upload signature');
        }
    }

    public function download($id)
    {
        $item = Surat::find($id);
        $pdf = PDF::loadview('pdf.tugas_dosen',compact('item'));
    	return $pdf->stream();
    }
}
