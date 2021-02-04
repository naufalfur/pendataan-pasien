<?php

namespace App\Http\Controllers;

use App\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        //
        $kelurahan = Kelurahan::all();

        return view('kelurahan.index', ['kelurahan'=>$kelurahan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $url = route('kelurahan.store');

        $data = [
            'url'=>$url,
            'kelurahan'=>null,
            'action'=>'Tambah',
        ];

        return view('kelurahan.form', $data);

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
        $request->validate([
           'nama_kelurahan'=>'required',
           'nama_kecamatan'=>'required',
           'nama_kota'=>'required'
        ]);

        $kelurahan = new Kelurahan([
            'nama_kelurahan'=>$request->get('nama_kelurahan'),
            'nama_kecamatan'=>$request->get('nama_kecamatan'),
            'nama_kota'=>$request->get('nama_kota'),
        ]);
        $kelurahan->save();

        return redirect('/kelurahan')->with('success', 'Data berhasil disimpan!');
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
        $url = route('kelurahan.update', $id);
        $data = [
            'url'=>$url,
            'kelurahan'=>Kelurahan::find($id),
            'action'=>'Edit',
        ];

        return view('kelurahan.form')->with($data);
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
        $request->validate([
            'nama_kelurahan' => 'required',
            'nama_kecamatan'=>'required',
            'nama_kota'=>'required',
        ]);

        $kelurahan = Kelurahan::find($id);
        $kelurahan->nama_kelurahan = $request->get('nama_kelurahan');
        $kelurahan->nama_kecamatan = $request->get('nama_kecamatan');
        $kelurahan->nama_kota = $request->get('nama_kota');
        $kelurahan->save();

        return redirect('/kelurahan')->with('success', 'Data berhasil diupdate');
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
        $kelurahan = Kelurahan::find($id);
        $kelurahan->delete();

        return redirect('/kelurahan')->with('success', 'Data berhasil dihapuskan');
    }
}
