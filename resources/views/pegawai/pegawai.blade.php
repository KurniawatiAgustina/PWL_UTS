@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pegawai</h3>
        </div>

        <div class="card-body">
            <a href="{{ url('/pegawai/create')}}" class="btn btn-sm
            btn-success mb-3">Tambah+</a>

            <div class="row g-3 align-items-center">
                <div class="col-auto">

                    {{-- membuat form untuk melakukan request, yaitu mengambil data berdasarkan asil pencarian --}}
                    <form action="/pegawai" method="GET">
                        <input type="search" id="search-data" name="search" class="form-control" placeholder="Cari nama pegawai...">
                    </form>
                </div>
            </div>

            `{{-- buat kondisi jika pesan menerima sebuah seesion --}}
            @if ( $pesan = Session::get('berhasil') )

                {{-- taruh alert di sini --}}
                <div class="alert alert-success mt-3" role="alert">
                    {{-- tampilkan pesannya --}}
                    <b> {{ $pesan }} </b>
                </div>

            @endif

            <table class="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pegawai</th>
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
                            <td>{{ $i + $data_pegawai->firstItem() }}</td>
                            <td>{{ $pegawai->kode_pegawai }}</td>
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
                        <td colspan="6" class="text-center">Data Pegawai masih kosong!</td>
                    </tr>
                @endif
            </tbody>
        </table>

        {{ $data_pegawai->links() }}

    </div>
</div>
    <!-- /.card -->

    <!-- /.card -->
    </section>
@endsection
