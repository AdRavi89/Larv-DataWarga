<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fakultas = Fakultas::paginate(10);
        return view('fakultas.index',['fakultas' => $fakultas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fakultas.create');
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
            'nama_fakultas' => ['required', 'string', 'max:255'],
        ]);
        $data = $request->all();
        Fakultas::create($data);
        return redirect('/fakultas');
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
        return view('fakultas.edit', ['item' => Fakultas::find($id)]);
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
            'nama_fakultas' => ['required', 'string', 'max:255'],
        ]);
        $data = $request->all();
        $user = Fakultas::find($id);
        $user->update($data);
        return redirect('/fakultas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $prodi = Prodi::has('fakultas')->where('fakultas_id', '=', $id)->first();
        if ($prodi) {
           return back()->withErrors(['errors' => 'Fakultas adalah foreign key, data masih terikat dengan Data Prodi']);
        }
        

        $fakultas = Fakultas::find($id);
        $fakultas->delete();
        return redirect('fakultas');
    }
}