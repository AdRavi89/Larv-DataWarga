<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Prodi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodis = Prodi::with('fakultas')->get();
        return view('pendaftaran.create', ['prodi' => $prodis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'tanggal_lahir' => 'required|date',
            'asal_sekolah' => 'required',
            'ijazah_url' => 'required|image',
            'prodi_id' => 'required|exists:prodis,id',
        ]);
        $data = $request->all();
        $data['ijazah_url'] = $request->file('ijazah_url')
            ->store('assets/ijazah', 'public');
        $data['status'] = 'DAFTAR';
        $data['tanggal_pendaftaran'] = Carbon::today();
        $data['user_id'] = Auth::user()->id;
        Pendaftaran::create($data);
        return redirect('/dashboard');
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