<?php

namespace App\Http\Controllers;

use App\Models\TugasAkhir;
use Illuminate\Http\Request;

class TugasAkhirController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'mahasiswa_id' => 'required',
            'kode_ta' => 'required|unique:tugas_akhir,kode_ta',
            'bidang_ta' => 'required',
            'judul_ta' => 'required',
            'url_ta' => 'required|url',
            'file_ta' => 'required',
            'proposal_ta' => 'required',
        ]);

        if (!$request->tanggal_upload) {
            $request->tanggal_upload=now();
        }


        $pathFile = $request->file('file_ta')->store('Tugas-Akhir');
        $pathProposal = $request->file('proposal_ta')->store('Proposal-Tugas-Akhir');

        TugasAkhir::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'kode_ta' => $request->kode_ta,
            'judul_ta' => $request->judul_ta,
            'bidang_ta' => $request->bidang_ta,
            'url_ta' => $request->url_ta,
            'file_ta' => $pathFile,
            'proposal_ta' => $pathProposal,
            'tanggal_upload' => $request->tanggal_upload,
        ]);

        return response()->json([
            'status'=>true,
            'message' => 'Tugas Akhir berhasil ditambahkan'
        ], 201);


    }
}
