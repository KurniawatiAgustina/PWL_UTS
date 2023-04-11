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
            btn-success mb-3">Tambah+</a>

            <table class="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pegawai</th>
                    <th>Foto Pegawai</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>jabatan</th>
                    <th>No Telephone</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($data_pegawai->count() > 0)
                    @foreach($data_pegawai as $i => $pegawai)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $film->kode_film }}</td>
                            <td>
                                <img src="{{ asset('foto_pegawai/'.$pegawai->gambar) }}" alt="" width="100px">
                            </td>
                            <td>{{ $pegawai->nama }}</td>
                            <td>{{ $pegawai->jk }}</td>
                            <td>{{ $pegawai->jabatan }}</td>
                            <td>{{ $pegawai->no_telp }}</td>
                            <td>{{ $pegawai->tanggal_lahir }}</td>
                            <td>{{ $pegawai->tempat_lahir }}</td>
                            <td>{{ $pegawai->alamat }}</td>
                            <td class="">
                                <a href="{{ url('/pegawai/' . $pegawai->id . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                <form class="d-inline" method="POST" action="{{ url('/pegawai/' . $pegawai->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" href="{{ url('/pegawai/' .$pegawai->id) }}" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">Data Film masih kosong!</td>
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
