@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pegawai</h3>

            {{-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widge="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widge="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div> --}}
        </div>
        <div class="card-body">
            <a href="{{ url('/pegawai/create')}}" class="btn btn-sm
            btn-success mb-3">Tambah+ </a>
       
            <table class="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pegawai</th>
                    <th>Gambar</th>
                    <th>Nama</th>
<<<<<<< HEAD
                    <th>kode_pegawai</th>
                    <th>Jk</th>
=======
                    <th>Jenis Kelamin</th>
>>>>>>> a6b782670498251959b048916c2fb056e13f2800
                    <th>jabatan</th>
                    <th>No Telephone</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
<<<<<<< HEAD
                @if($pegawai->count() > 0)
                @foreach ($pegawai as $i => $p)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$p->nama}}</td>
                  <td>{{$p->kode_pegawai}}</td>
                  <td>{{$p->jk}}</td>
                  <td>{{$p->jabatan}}</td>
                  <td>{{$p->no_telp}}</td>
                  <td>{{$p->tempat_lahir}}</td>
                  <td>{{$p->tanggal_lahir}}</td>
                  <td>{{$p->alamat}}</td>
                  <td class="">
                    {{-- Bikin simbol edit dan delete --}}
                    <a href="{{ url('/pegawai/'.$p->id.'/edit')}}" class="btn btn-sm btn-warning">Edit</a>

                    <form class="d-inline" method="POST" action="{{ url('/pegawai/'.$p->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" href="{{ url('/pegawai/' .$p->id)}}" class="btn btn-sm btn-danger">Delete</button>
                    </form>
=======
                @if($data_pegawai->count() > 0)
                    @foreach ($data_pegawai as $i => $pegawai)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{ $pegawai->kode_pegawai}}</td>
                            <td>
                                <img src="{{ asset('foto_pegawai/'.$pegawai->gambar) }}" alt="" width="100px">
                            </td>
                            <td>{{ $pegawai->nama }}</td>
                            <td>{{ $pegawai->jk }}</td>
                            <td>{{ $pegawai->jabatan }}</td>
                            <td>{{ $pegawai->tempat_lahir }}</td>
                            <td>{{ $pegawai->tanggal_lahir }}</td>
                            <td>{{ $pegawai->alamat }}</td>
                            <td>
                                {{-- Bikin simbol edit dan delete --}}
                                <a href="{{ url('')}}" class="btn btn-sm btn-warning">edit</a>
                            </td>
                            <td>
                                <form class="inline" method="POST" action="{{ url('') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                            </td>

                        </tr>
                    @endforeach
>>>>>>> a6b782670498251959b048916c2fb056e13f2800

                    @else
                    <tr>
                        <td colspan="9" class="text-center">Data Tidak Ada</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
<<<<<<< HEAD
</div>
    <!-- /.card -->
=======
>>>>>>> a6b782670498251959b048916c2fb056e13f2800

    <!-- /.card -->
    </section>
@endsection
