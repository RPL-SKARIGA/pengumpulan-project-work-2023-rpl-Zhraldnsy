@extends('layout.nav')
@section('tittle', 'Form Daftar')

@section('content')
@if($casis > 0)
<div class="row mt-4 text-center">
    <div class="alert alert-danger col-sm-12">
        <h4>Anda Telah Mendaftar</h4>
        <p>Silahkan tunggu pengkonfirmasian, lihat <a href="/status">status</a></p>
    </div>
@else
    <h2 style="width: 100%; border-bottom: 4px solid #687EFF; margin-top: 10px;"><b>PENDAFTARAN</b></h2>
    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{Auth::user()->id}}" name="id_user"/>
        <div class="row mt-4">
            <div class="alert alert-secondary col-sm-12">
                <h4>Biodata Siswa</h4>
            </div>
            <div class="form-floating mb-4 col-sm-12 mt-2">
                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="floatingInput" placeholder="Nama Lengkap" name="nama_siswa">
                <label for="floatingInput">Nama Lengkap</label>
                @error('nama_siswa')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 col-sm-2"><b>Jenis Kelamin</b></div>
            <div class="form-check mb-4 col-sm-2">
                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="gender" value="L">
                <label class="form-check-label" for="gender">
                    Laki-Laki
                </label>
            </div>
            <div class="form-check mb-4 col-sm-4">
                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="gender" value="P">
                <label class="form-check-label" for="gender">
                    Perempuan
                </label>
            </div>
            <div class="form-floating mb-4 col-sm-12">
                <input type="text" class="form-control @error('kota') is-invalid @enderror" id="floatingInput" placeholder="Kota Lahir" name="tempat_lahir">
                <label for="floatingInput">Kota Lahir</label>
                @error('kota')
                <div class="invalid-feedback"> {{$message}} </div>
            @enderror
            </div>
       
            <label for="date" class="col-sm-2 mb-4 col-form-label"><b>Tanggal Lahir</b></label>
            <div class="col-5 mb-2">
                <div class="input-group date" id="datepicker">
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="date" name="tanggal_lahir" />
                    @error('tanggal_lahir')
                <div class="invalid-feedback"> {{$message}} </div>
                 @enderror
                </div>
            </div>
            <div class="form-floating mb-4 col-sm-12">
                <input type="number" class="form-control @error('nisn') is-invalid @enderror" id="floatingInput" placeholder="NISN" name="nisn">
                <label for="floatingInput">Nomor Induk Siswa Nasional</label>
                @error('nisn')
                    <div class="invalid-feedback"> {{$message}}</div>
                @enderror
            </div>

            <label for="jurusan" class="col-sm-2 mb-5 col-form-label"><b>Pilihan Jurusan 1</b></label>
            <div class="mb-4 col-sm-4 jurusan">
                <select class="form-select jurusan @error('pilihan_jurusan_1') is-invalid @enderror" aria-label="Default select example" name="pilihan_jurusan_1">
                    <option selected>Pilihan</option>
                    @foreach ($jurusan as $item)
                        <option value="{{ $item->id }}"> {{ $item->nama_jurusan }} </option>
                    @endforeach
                </select>
                @error('pilihan_jurusan_1')
                <div class="invalid-feedback"> {{$message}}</div>
                 @enderror
            </div>
            <label for="jurusan" class="col-sm-2 mb-5 col-form-label"><b>Pilihan Jurusan 2</b></label>
            <div class="mb-4 col-sm-4 jurusan">
                <select class="form-select jurusan @error('pilihan_jurusan_2') is-invalid @enderror" aria-label="Default select example" name="pilihan_jurusan_2">
                    <option selected>Pilihan</option>
                    @foreach ($jurusan as $item)
                        <option value="{{ $item->id }}"> {{ $item->nama_jurusan }} </option>
                    @endforeach
                </select>
                @error('pilihan_jurusan_2')
                <div class="invalid-feedback"> {{$message}}</div>
                 @enderror
            </div>
            <label for="eskul" class="col-sm-2 mb-4 col-form-label"><b>Pilihan eskul 1</b></label>
            <div class="mb-4 col-sm-4 eskul">
                <select class="form-select eskul @error('pilihan_eskul_1') is-invalid @enderror" aria-label="Default select example" name="pilihan_eskul_1">
                    <option selected>Pilihan</option>
                    @foreach ($eskul as $item)
                        <option value="{{ $item->id }}"> {{ $item->nama_eskul }} </option>
                    @endforeach
                </select>
                @error('pilihan_eskul_1')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <label for="eskul" class="col-sm-2 mb-4 col-form-label"><b>Pilihan eskul 2</b></label>
            <div class="mb-4 col-sm-4 eskul">
                <select class="form-select eskul @error('pilihan_eskul_2') is-invalid @enderror" aria-label="Default select example" name="pilihan_eskul_2">
                    <option selected>Pilihan</option>
                    @foreach ($eskul as $item)
                        <option value="{{ $item->id }}"> {{ $item->nama_eskul }} </option>
                    @endforeach
                </select>
                @error('pilihan_eskul_2')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="alert alert-secondary col-sm-12 mt-2">
                <h4>Biodata Asal Sekolah Menengah Pertama</h4>
            </div>

            <div class="form-floating mb-4 col-sm-12 mt-3">
                <input type="text" class="form-control @error('nama_asal_sekolah') is-invalid @enderror" id="floatingInput" placeholder="Nama Asal Sekolah"
                    name="nama_asal_sekolah">
                <label for="floatingInput">Nama Asal Sekolah</label>
                @error('nama_asal_sekolah')
                    <div class="invalid-feedback"> {{$message}} </div>                    
                @enderror
            </div>
            <div class="form-floating mb-4 col-sm-6">
                <input type="text" class="form-control @error('kota') is-invalid @enderror" id="floatingInput" placeholder="Kota" name="kota">
                <label for="floatingInput">Kota</label>
                @error('kota')
                    <div class="invalid-feedback"> {{$message}} </div>
                @enderror
            </div>
            <div class="form-floating mb-4 col-sm-6">
                <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="floatingInput" placeholder="Provins" name="provinsi">
                <label for="floatingInput">Provinsi</label>
                @error('provinsi')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-floating mb-4 col-sm-12">
                <input type="text" class="form-control @error('alamat_sekolah') is-invalid @enderror" id="floatingInput" placeholder="Alamat Sekolah"
                    name="alamat_sekolah">
                <label for="floatingInput">Alamat Sekolah</label>
                @error('alamat_sekolah')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="alert alert-secondary col-sm-12 mt-2">
                <h4>Biodata Ayah</h4>
            </div>
            <div class="form-floating mb-4 col-sm-12 mt-3">
                <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="floatingInput" placeholder="Nama Ayah" name="nama_ayah">
                <label for="floatingInput">Nama Ayah</label>
                @error('nama_ayah')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-floating mb-4 col-sm-6 mt-3">
                <input type="number" class="form-control @error('no_telp_ayah') is-invalid @enderror" id="floatingInput" placeholder="Nomor Telphone"
                    name="no_telp_ayah">
                <label for="floatingInput">Nomor Telphone</label>
                @error('no_telp_ayah')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-floating mb-4 col-sm-6 mt-3">
                <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" id="floatingInput" placeholder="Pekerjaan"
                    name="pekerjaan_ayah">
                <label for="floatingInput">Pekerjaan</label>
                @error('pekerjaan_ayah')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-floating mb-4 col-sm-6">
                <input type="text" class="form-control @error('alamat_ayah') is-invalid @enderror" id="floatingInput" placeholder="Alamat Rumah"
                    name="alamat_ayah">
                <label for="floatingInput">Alamat Rumah</label>
                @error('alamat_ayah')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="alert alert-secondary col-sm-12 mt-2">
                <h4>Biodata Ibu</h4>
            </div>
            <div class="form-floating mb-4 col-sm-12 mt-3">
                <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="floatingInput" placeholder="Nama Ibu" name="nama_ibu">
                <label for="floatingInput">Nama Ibu</label>
                @error('nama_ibu')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-floating mb-4 col-sm-6 mt-3">
                <input type="number" class="form-control @error('no_telp_ibu') is-invalid @enderror" id="floatingInput" placeholder="Nomor Telphone"
                    name="no_telp_ibu">
                <label for="floatingInput">Nomor Telphone</label>
                @error('no_telp_ibu')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-floating mb-4 col-sm-6 mt-3">
                <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" id="floatingInput" placeholder="Pekerjaan"
                    name="pekerjaan_ibu">
                <label for="floatingInput">Pekerjaan</label>
                @error('pekerjaan_ibu')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-floating mb-4 col-sm-6">
                <input type="text" class="form-control @error('alamat_ibu') is-invalid @enderror" id="floatingInput" placeholder="Alamat Rumah"
                    name="alamat_ibu">
                <label for="floatingInput">Alamat Rumah</label>
                @error('alamat_ibu')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-outline-dark btn-lg rounded-pill mt-4 mb-3 w-100">Daftar</button>

    </form>
@endif
@endsection
