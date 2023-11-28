<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodis = Prodi::with('fakultas')->paginate(10);
        return view('prodi.index', ['prodi' => $prodis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fakultas = Fakultas::pluck('nama_fakultas', 'id');
        return view('prodi.create', ['fakultas' => $fakultas]);
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
            'nama_prodi' => ['required', 'string', 'max:255'],
            'fakultas_id' => ['required', 'integer', 'exists:fakultas,id'],
        ]);
        $data = $request->all();
        Prodi::create($data);
        return redirect('/prodi');
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
        $fakultas = Fakultas::pluck('nama_fakultas', 'id');
        return view('prodi.edit', ['item' => Prodi::find($id)],['fakultas' => $fakultas]);

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
        $request->validate([
            'fakultas_id' => ['required'],
            'nama_prodi' => ['required', 'string', 'max:255'],
        ]);
        $data = $request->all();
        $user = Prodi::find($id);
        $user->update($data);
        return redirect('/prodi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodi = Prodi::find($id);
        $prodi->delete();
        return redirect('/prodi');        
    }
}