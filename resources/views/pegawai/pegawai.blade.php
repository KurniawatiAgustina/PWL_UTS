@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pegawai</h3>
        </div>

        <div class="card-body">

            <a href="{{ url('/pegawai/create')}}" class="btn btn-sm btn-success mb-3">Tambah+</a>

            <div class="row g-3 align-items-center">
                <div class="col-auto">

                    {{-- membuat form untuk melakukan request, yaitu mengambil data berdasarkan asil pencarian --}}
                    <form action="/pegawai" method="GET">
                        <input type="search" id="search-data" name="search" class="form-control" placeholder="Cari nama pegawai...">
                    </form>
                </div>
            </div>

            {{-- buat kondisi jika pesan menerima sebuah seesion --}}
            {{-- @if ( $pesan = Session::get('berhasil') ) --}}

                {{-- <div class="alert alert-success mt-3" role="alert" --}}
                    {{-- <b> {{ $pesan }} </b> --}}
                {{-- </div> --}}

            {{-- @endif --}}

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
                                    <input type="hidden" class="delete-id" value="{{ $pegawai->id }}">
                                    <input type="hidden" class="delete-name" value="{{ $pegawai->nama }}">
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
                                        <a href="{{ url('/pegawai/' . $pegawai->id . '/edit') }}" class="btn btn-sm btn-warning">Ubah</a>
                                        <form class="d-inline" method="POST" action="{{ url('/pegawai/' . $pegawai->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" href="{{ url('/pegawai/' . $pegawai->id) }}" class="btn btn-sm btn-danger btn-delete-pegawai" data-name="{{ $pegawai->nama }}">Hapus</button>
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
</section>

@include('sweetalert::alert')
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btn-delete-pegawai').click(function (e) {
            e.preventDefault();

            var id = $(this).closest("tr").find('.delete-id').val();
            var name = $(this).closest("tr").find('.delete-name').val();

            swal({
                    title: "Apakah Anda Yakin?",
                    text: "Setelah dihapus, Data Pegawai " + name + " Tidak Bisa Dikembalikan!!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name=_token]').val(),
                            'id': id,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: 'pegawai/' + id,
                            data: data,
                            success: function (response) {
                                swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                        window.location = '/pegawai/';
                    }
                });
        });

    });

</script>
@endsection
