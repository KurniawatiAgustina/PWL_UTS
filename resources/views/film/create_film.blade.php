@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Film</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ $url_form }}" enctype="multipart/form-data">
                @csrf
                {!! isset($data_film) ? method_field('PUT') : '' !!}
                <div class="form-group">
                    <label for="kode_film">Kode Film</label>
                    <input type="text" id="kode_film" class="form-control" name="kode_film" value="{{ isset($data_film) ? $data_film->kode_film : old('kode_film') }}">

                    @error('kode_film')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar_film">Gambar Film</label>
                    <input type="file" id="gambar_film" class="form-control" name="gambar" value="{{ isset($data_film) ? $data_film->gambar : old('gambar') }}">

                    @error('gambar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_film">Nama Film</label>
                    <input type="text" id="nama_film" class="form-control" name="nama" value="{{ isset($data_film) ? $data_film->nama : old('nama') }}">

                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_tayang">Tanggal Tayang</label>
                    <input type="text" id="tanggal_tayang" class="form-control" name="tgl_tayang" value="{{ isset($data_film) ? $data_film->tgl_tayang : old('tgl_tayang') }}">

                    @error('tgl_tayang')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah_tayang">Jumlah Tayang</label>
                    <input type="text" id="jumlah_tayang" class="form-control" name="jml_tayang" value="{{ isset($data_film) ? $data_film->jml_tayang : old('jml_tayang') }}">

                    @error('jml_tayang')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="text" id="rating" class="form-control" name="rating" value="{{ isset($data_film) ? $data_film->rating : old('rating') }}">

                    @error('rating')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga_film">Harga Tiket</label>
                    <input type="text" id="harga_film" class="form-control" name="harga" value="{{ isset($data_film) ? $data_film->harga : old('harga') }}">

                    @error('harga')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group text-left">
                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>
@endsection
