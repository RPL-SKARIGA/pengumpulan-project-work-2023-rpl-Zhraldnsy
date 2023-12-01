@extends('layout.side')
@section('tittle', 'Tambah Eskul')

@section('content')
        <h2 style="width: 100%; border-bottom: 4px solid #687EFF; margin-top: 45px; " ><b class="primary-text ">Form Input Ekstrakurikuler</b></h2>
        <form action=" {{ route('eskul.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-floating mb-3 col-sm-12 mt-3">
                    <input type="text" class="form-control @error('nama_eskul') is-invalid @enderror" id="floatingInput" placeholder="Nama Eskstrakurikuler" name="nama_eskul">
                    <label for="floatingInput">Nama Ekstrakurikuler</label>
                    @error('nama_eskul')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-outline-light me-3 btn-lg rounded-pill mt-2 mb-3 w-100 primary-text ">Tambah</button>
                    <a href="/eskul" class="btn btn-outline-danger btn-lg rounded-pill mt-2 mb-3 w-100 primary-text">Batal</a>
                </div>
        </form>  
    @endsection