@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Pasien</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('pasien.create')}}" class="btn btn-outline-primary">Tambah Pasien</a></li>
        </ol>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Pasien
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>RT/RW/</th>
                            <th>Kelurahan</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>RT/RW/</th>
                            <th>Kelurahan</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if(count($pasien) > 0)
                            @foreach($pasien as $k=>$v)
                                <tr>
                                    <td>{{$k+1}}</td>
                                    <td>{{$v->nama_pasien}}</td>
                                    <td>{{$v->alamat}}</td>
                                    <td>{{$v->no_telepon}}</td>
                                    <td>{{$v->rt_rw}}</td>
                                    <td>{{$v->kelurahan->nama_kelurahan}}</td>
                                    <td>{{$v->tanggal_lahir}}</td>
                                    @if($v->jenis_kelamin == 'laki_laki')
                                        <td>Laki-laki</td>
                                    @elseif($v->jenis_kelamin == 'perempuan')
                                        <td>Perempuan</td>
                                    @endif
                                    <td><a href="{{route('pasien.edit', $v->id)}}" class="btn btn-info btn-sm">Edit</a></td>
                                    <td>
                                        <form action="{{ route('pasien.destroy', $v->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Apakah anda yakin? Prodi dan Mahasiswa yang berhubungan akan dihapus')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="10" class="text-center">Data Tidak Ditemukan</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
