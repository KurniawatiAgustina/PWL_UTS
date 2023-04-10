@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Film</h3>
        </div>

        <div class="card-body">

            <a href="{{ url('/film/create') }}" class="btn btn-sm btn-success my-2">Tambah +</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Film</th>
                        <th>Gambar</th>
                        <th>Tanggal Tayang</th>
                        <th>Rating</th>
                        <th>Jumlah Tayang</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>

                    @if ($data_film->count() > 0)
                    @foreach($data_flim as $i => $film)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $film->id_film }}</td>
                            <td>{{ $film->gambar }}</td>
                            <td>{{ $film->nama }}</td>
                            <td>{{ $film->tgl_tayang }}</td>
                            <td>{{ $film->jml_tayang }}</td>
                            <td>{{ $film->rating }}</td>
                            <td>{{ $film->harga }}</td>
                            <td class="">
                                <a href="{{ url('') }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <form class="d-inline" method="POST" action="{{ url('') }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" href="{{ url('') }}" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
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

    </section>
@endsection
