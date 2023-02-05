<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.admin.dosen');
    }

    public function showData(){
        $dosen=Dosen::orderBy('nama','asc')->get();
        return response()->json([
            'data'=>$dosen
        ]);
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
        $request->merge([
            'username'=>strtolower(str_replace(' ', '', $request->nama)),
        ]);
        $request->validate([
            'username'=>'required|unique:users,username',
            'nip'=>'required|unique:users,no_identitas',
            'nama'=>'required',
            'tempat_lahir'=>'required',
            'no_tlpn'=>'required|unique:dosen,no_tlpn',
            'alamat'=>'required',
            'jenis_kelamin'=>'required',
            'prodi'=>'required',
            'tahun_masuk'=>'required',
        ]);

        $user=User::create([
            'no_identitas'=>$request->nip,
            'username'=>$request->username,
            'password'=>"password",
            'role'=>'dosen',
        ]);

        Dosen::create([
            'user_id'=>$user->id,
            'nama'=>$request->nama,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'no_tlpn'=>$request->no_tlpn,
            'alamat'=>$request->alamat,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'prodi'=>$request->prodi,
            'tahun_masuk'=>$request->tahun_masuk,
        ]);
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
    public function destroy(Request $request)
    {
        $dosen=Dosen::whereIn('id',$request->id);
        User::whereIn('id',$dosen->pluck('user_id'))->delete();
        $dosen->delete();
    }
}
