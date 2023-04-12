@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Film</h3>
        </div>

        <div class="card-body">

            <a href="{{ url('/film/create') }}" class="mb-3 btn btn-sm btn-success my-2">Tambah+</a>

            <div class="row g-3 align-items-center">
                <div class="col-auto">

                    {{-- membuat form untuk melakukan request, yaitu mengambil data berdasarkan asil pencarian --}}
                    <form action="/film" method="GET">
                        <input type="search" id="search-data" name="search" class="form-control" placeholder="Cari film...">
                    </form>
                </div>
            </div>

            {{-- buat kondisi jika pesan menerima sebuah seesion --}}
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
                        <th>Kode Film</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Tanggal Tayang</th>
                        <th>Jumlah Tayang</th>
                        <th>Rating</th>
                        <th>Harga Tiket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @if ($data_film->count() > 0)
                    @foreach($data_film as $i => $film)
                        <tr>
                            <td>{{ $i + $data_film->firstItem() }}</td>
                            <td>{{ $film->kode_film }}</td>
                            <td>
                                <img src="{{ asset('foto_film/'.$film->gambar) }}" alt="" width="100px">
                            </td>
                            <td>{{ $film->nama }}</td>
                            <td>{{ $film->tgl_tayang }}</td>
                            <td>{{ $film->jml_tayang }}</td>
                            <td>{{ $film->rating }}</td>
                            <td>{{ $film->harga }}</td>
                            <td class="">
                                <a href="{{ url('/film/' . $film->id . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                <form class="d-inline" method="POST" action="{{ url('/film/' . $film->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" href="{{ url('/film/' .$film->id) }}" class="btn btn-sm btn-danger">Delete</button>
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

            {{ $data_film->links() }}

        </div>
    </div>
</section>
@endsection
