@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Kelurahan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('kelurahan.create')}}" class="btn btn-outline-primary">Tambah Kelurahan</a></li>
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
                Data Kelurahan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kelurahan</th>
                            <th>Nama Kecamatan</th>
                            <th>Nama Kota</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kelurahan</th>
                            <th>Nama Kecamatan</th>
                            <th>Nama Kota</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if(count($kelurahan) > 0)
                            @foreach($kelurahan as $k=>$v)
                                <tr>
                                    <td>{{$k+1}}</td>
                                    <td>{{$v->nama_kelurahan}}</td>
                                    <td>{{$v->nama_kecamatan}}</td>
                                    <td>{{$v->nama_kota}}</td>
                                    <td><a href="{{route('kelurahan.edit', $v->id)}}" class="btn btn-info btn-sm">Edit</a></td>
                                    <td>
                                        <form action="{{ route('kelurahan.destroy', $v->id)}}" method="post">
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
