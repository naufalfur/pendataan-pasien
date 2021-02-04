<?php

namespace App\Http\Controllers;

use App\Kelurahan;
use App\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Instantiate a new UserController instance.
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:operator', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        //
        $pasien = Pasien::all();

        return view('pasien.index', ['pasien'=>$pasien]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kelurahan = Kelurahan::all();
        if (count($kelurahan) == 0) {
            return redirect('/kelurahan')->with('success','Tidak terdapat Kelurahan, Silahkan tambahkan terlebih dahulu!');
        }

        $url = route('pasien.store');

        $data = [
            'url'=>$url,
            'pasien'=>null,
            'action'=>'Tambah',
            'kelurahan'=>$kelurahan
        ];

        return view('pasien.form', $data);
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
            'nama_pasien' => 'required',
            'alamat'=>'required',
            'no_telepon'=>'required',
            'rt_rw'=>'required',
            'tanggal_lahir'=>'required|date',
            'jenis_kelamin'=>'required',
            'kelurahan_id'=>'required'
        ]);

        $lastPasienId = Pasien::select('id')->orderBy('id','desc')->first()->id;
        if (!$lastPasienId){
            $lastPasienId='000000';
        } else {
            $lastPasienId=substr($lastPasienId , -6);
        }

        $pasien = new Pasien([
            'id'=>(int)(date('ym').$lastPasienId)+1,
            'nama_pasien'=>$request->get('nama_pasien'),
            'alamat'=>$request->get('alamat'),
            'no_telepon'=>$request->get('no_telepon'),
            'rt_rw'=>$request->get('rt_rw'),
            'tanggal_lahir'=>$request->get('tanggal_lahir'),
            'jenis_kelamin'=>$request->get('jenis_kelamin'),
            'kelurahan_id'=>$request->get('kelurahan_id'),
        ]);
        $pasien->save();

        return redirect('/pasien')->with("Data berhasil ditambahkan");
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
        $pasien = Pasien::find($id);
        $pasien->delete();

        return redirect('/pasien')->with('success', 'Data berhasil dihapuskan');
    }
}
