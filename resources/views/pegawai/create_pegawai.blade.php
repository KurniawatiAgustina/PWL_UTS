@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pegawai</h3>

           <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widge="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widge="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ $url_form }}" enctype="multipart/form-data">
                @csrf
                {!! (isset($data_pegawai))? method_field('PUT') : '' !!}
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ isset($data_pegawai)? $data_pegawai->nama: old('nama') }}" name="nama" type="text" />
                  @error('nama')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="kode_pegawai">Kode Pegawai</label>
                  <input id="kode_pegawai" class="form-control @error('kode_pegawai') is-invalid @enderror" value="{{ isset($data_pegawai)? $data_pegawai->kode_pegawai:old('kode_pegawai') }}" name="kode_pegawai" type="text"/>
                  @error('kode_pegawai')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar Pegawai</label>
                    <input id="gambar" type="file" id="gambar_pegawai" class="form-control" name="gambar" value="{{ isset($data_pegawai) ? $data_pegawai->gambar : old('gambar') }}">

                    @error('gambar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select id="jk" class="form-control" @error('jk') is-invalid @enderror" value="{{ isset($data_pegawai)? $data_pegawai->jk:old('jk') }}" name="jk">
                        <option selected>--Pilih Jenis Kelamin--</option>
                        <option value="l">Laki - laki</option>
                        <option value="p">Perempuan</option>
                    </select>

                    @error('jk')
                        <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ isset($data_pegawai)? $data_pegawai->jabatan:old('jabatan') }}" name="jabatan" type="text"/>
                    @error('jabatan')
                      <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                  </div>

                <div class="form-group">
                  <label for="no_telp">No Telphone</label>
                  <input id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ isset($data_pegawai)? $data_pegawai->no_telp:old('no_telp') }}" name="no_telp" type="text"/>
                  @error('no_telp')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
                </div>

                <div>
                  <label for="tempat_lahir">Tempat lahir</label>
                  <input id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ isset($data_pegawai)? $data_pegawai->tempat_lahir:old('tempat_lahir') }}" name="tempat_lahir" type="text"/>
                  @error('tempat_lahir')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ isset($data_pegawai)? $data_pegawai->tanggal_lahir:old('tanggal_lahir') }}" name="tanggal_lahir" type="text"/>
                  @error('tanggal_lahir')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ isset($data_pegawai)? $data_pegawai->alamat:old('alamat') }}" name="alamat" type="text"/>
                  @error('alamat')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
                </div>
                <div class="form-group">
                  <button class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>

    </div>
    <!-- /.card -->

    </section>
@endsection
