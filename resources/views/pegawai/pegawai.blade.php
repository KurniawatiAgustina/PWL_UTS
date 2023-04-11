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
                    <th>kode_pegawai</th>
                    <th>Jk</th>
                    <th>jabatan</th>
                    <th>No Telephone</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
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

                    @else
                    <tr>
                        <td colspan="9" class="text-center">Data Tidak Ada</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
    <!-- /.card -->

    <!-- /.card -->
    </section>
@endsection
