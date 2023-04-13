@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pegawai</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ $url_form }}" enctype="multipart/form-data">
                @csrf
                {!! isset($data_pegawai) ? method_field('PUT') : '' !!}
                <div class="form-group">
                    <label for="kode_pegawai">Kode Pegawai</label>
                    <input id="kode_pegawai" class="form-control" value="{{ isset($data_pegawai) ? $data_pegawai->kode_pegawai: old('kode_pegawai') }}" name="kode_pegawai" type="text" />

                    @error('kode_pegawai')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input id="nama" class="form-control" value="{{ isset($data_pegawai)? $data_pegawai->nama: old('nama') }}" name="nama" type="text" />

                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select id="jk" class="form-control" value="{{ isset($data_pegawai)? $data_pegawai->jk:old('jk') }}" name="jk">
                        <option selected>--Pilih Jenis Kelamin--</option>
                        <option value="Laki-Laki">Laki - laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jk')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input id="jabatan" class="form-control" value="{{ isset($data_pegawai) ? $data_pegawai->jabatan:old('jabatan') }}" name="jabatan" type="text"/>

                    @error('jabatan')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_telp">No. Telp</label>
                    <input id="no_telp" class="form-control" value="{{ isset($data_pegawai) ? $data_pegawai->no_telp:old('no_telp') }}" name="no_telp" type="text"/>

                    @error('no_telp')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input id="tanggal_lahir" class="form-control" value="{{ isset($data_pegawai) ? $data_pegawai->tanggal_lahir:old('tanggal_lahir') }}" name="tanggal_lahir" type="text"/>

                    @error('tanggal_lahir')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input id="tempat_lahir" class="form-control" value="{{ isset($data_pegawai) ? $data_pegawai->tempat_lahir:old('tempat_lahir') }}" name="tempat_lahir" type="text"/>

                    @error('tempat_lahir')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input id="alamat" class="form-control" value="{{ isset($data_pegawai) ? $data_pegawai->alamat:old('alamat') }}" name="alamat" type="text"/>
                    @error('alamat')
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
