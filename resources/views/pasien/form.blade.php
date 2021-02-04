@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Pasien</h1>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                {{$action}} Pasien
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
                    @if($pasien)
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{$pasien?$pasien->id?$pasien->id:old('id'):old('id')}}">
                    @endif
                    <div class="form-group">
                        <label class="small mb-1" for="nama_pasien">Nama Pasien</label>
                        <input class="form-control py-4" name="nama_pasien" id="nama_pasien" required="required" type="text" placeholder="Masukkan Nama Pasien" value="{{$pasien?$pasien->nama_pasien?$pasien->nama_pasien:old('nama_pasien'):old('nama_pasien')}}" />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="alamat">Alamat</label>
                        <input class="form-control py-4" name="alamat" id="alamat" required="required" type="text" placeholder="Masukkan Alamat Pasien" value="{{$pasien?$pasien->alamat?$pasien->alamat:old('alamat'):old('alamat')}}" />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="no_telepon">No Telepon</label>
                        <input class="form-control py-4" name="no_telepon" id="no_telepon" required="required" type="number" placeholder="Masukkan Telepon pasien" value="{{$pasien?$pasien->no_telepon?$pasien->no_telepon:old('no_telepon'):old('no_telepon')}}" />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="rt_rw">RT/RW</label>
                        <input class="form-control py-4" name="rt_rw" id="rt_rw" required="required" type="text" placeholder="Masukkan RT/RW pasien" value="{{$pasien?$pasien->rt_rw?$pasien->rt_rw:old('rt_rw'):old('rt_rw')}}" />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="prodi_id">Kelurahan</label>
                        <select class="form-control" id="kelurahan_id" name="kelurahan_id" required="required">
                            <option value="">--Pilih Kelurahan--</option>
                            @foreach($kelurahan as $k=>$v)
                                <option value="{{$v->id}}" {{$pasien?$pasien->kelurahan_id == $v->id?'selected':old('kelurahan_id')  == $v->id?'selected':'':old('kelurahan_id')  == $v->id?'selected':''}}>
                                    {{$v->nama_kelurahan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir" class="small mb-1">Tanggal Lahir</label>
                        <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" required="required" value="{{$pasien?$pasien->tanggal_lahir?$pasien->tanggal_lahir:old('tanggal_lahir'):old('tanggal_lahir')}}">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required="required">
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="laki_laki" {{$pasien?$pasien->jenis_kelamin == "laki_laki"?'selected':old('jenis_kelamin')  == "laki_laki"?'selected':'':old('jenis_kelamin')  == "laki_laki"?'selected':''}}>
                                Laki-laki</option>
                            <option value="perempuan" {{$pasien?$pasien->jenis_kelamin == "perempuan"?'selected':old('jenis_kelamin')  == "perempuan"?'selected':'':old('jenis_kelamin')  == "perempuan"?'selected':''}}>
                                Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">{{$action}} Pasien</button></div>
                </form>
            </div>
        </div>

    </div>
@endsection
