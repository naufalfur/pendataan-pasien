@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Kelurahan</h1>
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    {{$action}} Kelurahan
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <form method="post" action="{{$url}}">
                        @csrf
                        @if($kelurahan)
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{$kelurahan?$kelurahan->id?$kelurahan->id:old('id'):old('id')}}">
                        @endif
                        <div class="form-group">
                            <label class="small mb-1" for="nama_kelurahan">Nama Kelurahan</label>
                            <input class="form-control py-4" name="nama_kelurahan" id="nama_kelurahan" required="required" type="text" placeholder="Masukkan Nama Kelurahan" value="{{$kelurahan?$kelurahan->nama_kelurahan?$kelurahan->nama_kelurahan:old('nama_kelurahan'):old('nama_kelurahan')}}" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_kecamatan">Nama Kecamatan</label>
                            <input class="form-control py-4" name="nama_kecamatan" id="nama_kecamatan" required="required" type="text" placeholder="Masukkan Nama Kelurahan" value="{{$kelurahan?$kelurahan->nama_kecamatan?$kelurahan->nama_kecamatan:old('nama_kecamatan'):old('nama_kecamatan')}}" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_kota">Nama Kota</label>
                            <input class="form-control py-4" name="nama_kota" id="nama_kota" required="required" type="text" placeholder="Masukkan Nama Kelurahan" value="{{$kelurahan?$kelurahan->nama_kota?$kelurahan->nama_kota:old('nama_kota'):old('nama_kota')}}" />
                        </div>
                        <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">{{$action}} Kelurahan</button></div>
                    </form>
                </div>
            </div>

    </div>
@endsection
