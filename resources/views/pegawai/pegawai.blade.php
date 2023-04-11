@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Film</h3>

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
            <a href="{{ url('pegawai/create')}}" class="btn btn-sm
            btn-success">Tambah Data</a>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>id_pegawai</th>
                    <th>Jk</th>
                    <th>jabatan</th>
                    <th>no_telp</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal lahir</th>
                    <th>Alamat</th>
                   
                </tr>
            </thead>
            <tbody>
                @if($pegawai->count() > 0)
                @foreach ($pegawai as $i => $p)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$p->nama}}</td>
                  <td>{{$p->id_pegawai}}</td>
                  <td>{{$p->jk}}</td>
                  <td>{{$p->jabatan}}</td>
                  <td>{{$p->tempat_lahir}}</td>
                  <td>{{$p->tanggal_lahir}}</td>
                  <td>{{$p->alamat}}</td>
                  <td>
                    {{-- Bikin simbol edit dan delete --}}
                    <a href="{{ url('/pegawai/'.$m->id.'/edit')}}" class="btn btn-sm btn-warning">edit</a>

                    <form class="inline" method="POST" action="{{ url('/pegawai/'.$m->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                    

                </td>
                
                </tr>
                @endforeach

                @else
                <tr><td colspan="9" class="text-center">Data Tidak Ada</td></tr>
                    
                @endif
            </tbody>      
              </table>   
    </div>
    <!-- /.card -->

    </section>
@endsection