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
            <form method="POST" action="{{ $url_form }}">
                @csrf
                {!! (isset($pegawai))? method_field('PUT') : '' !!}
                <div class="form-group">
                  <label>Nama</label>
                  <input class="form-control @error('nama') is-invalid @enderror" value="{{ isset($pegawai)? $pegawai->nama: old('nama') }}" name="nama" type="text" />
                  @error('nama')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror

                </div>
                <div class="form-group">
                  <label>Id Pegawai</label>
                  <input class="form-control @error('id pegawai') is-invalid @enderror" value="{{isset($pegawai)? $pegawai->nama:old('id pegawai') }}" name="id pegawai" type="text"/>
                  @error('id pegawai')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror

                </div>
                <div class="form-group">
                  <label>JK</label>
                  <input class="form-control @error('jk') is-invalid @enderror" value="{{ isset($pegawai)? $pegawai->jk:old('jk') }}" name="jk" type="text"/>
                  @error('jk')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror

                </div>
                <div class="form-group">
                  <label>No Tlp</label>
                  <input class="form-control @error('no tlp') is-invalid @enderror" value="{{ isset($pegawai)? $pegawai->notlp:old('no tlp') }}" name="no tlp" type="text"/>
                  @error('no tlp')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror

                </div>
                  <label>Tempat lahir</label>
                  <input class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ isset($pegawai)? $pegawai->tempat_lahir:old('tempat_lahir') }}" name="tempat_lahir" type="text"/>
                  @error('tempat_lahir')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror

                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ isset($pegawai)? $pegawai->tanggal_lahir:old('tanggal_lahir') }}" name="tanggal_lahir" type="text"/>
                  @error('tanggal_lahir')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror

                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input class="form-control @error('alamat') is-invalid @enderror" value="{{ isset($pegawai)? $pegawai->alamat:old('alamat') }}" name="alamat" type="text"/>
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