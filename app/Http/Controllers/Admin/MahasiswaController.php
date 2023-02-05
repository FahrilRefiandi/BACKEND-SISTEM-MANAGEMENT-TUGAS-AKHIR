<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.admin.mahasiswa');
    }

    public function showData(){
        $data=Mahasiswa::orderBy('nama','asc')->get();
        return response()->json([
            'data'=>$data,
        
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
        // dd($request->all());
        $request->merge([
            'username'=>strtolower(str_replace(' ', '', $request->nama)),
        ]);
        $request->validate([
            'username'=>'required|unique:users,username',
            'nim'=>'required|unique:users,no_identitas',
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'prodi'=>'required',
            'angkatan'=>'required',
            'alamat'=>'required',
            'tempat_lahir'=>'required',
            'no_tlpn'=>'required',
        ]);

        

        // generate username from nama
        

        $user=User::create([
            'no_identitas'=>$request->nim,
            'username'=>$request->username,
            'password'=>"password",
            'role'=>'mahasiswa',
        ]);

        Mahasiswa::create([
            'user_id'=>$user->id,
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'prodi'=>$request->prodi,
            'tahun_masuk'=>$request->angkatan,
            'alamat'=>$request->alamat,
            'tempat_lahir'=>$request->tempat_lahir,
            'no_tlpn'=>$request->no_tlpn,
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
        $mahasiswa=Mahasiswa::whereIn('id',$request->id);
        User::whereIn('id',$mahasiswa->pluck('user_id'))->delete();
        $mahasiswa->delete();
    }
}
