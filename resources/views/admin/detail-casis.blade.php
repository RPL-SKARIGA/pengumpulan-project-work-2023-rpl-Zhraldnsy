@extends('layout.side')
@section('tittle', 'Detail Calon Siswa')

@section('content')
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0 primary-text">Detail Calon Siswa</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle second-text fw-bold primary-text" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2 primary-text"> Zohar Aldiansyah</i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row mt-2 bg-transparent ">
                <div class="alert alert-secondary col-sm-12">
                    <h4>Biodata Siswa</h4>
                </div>
                <div class="form-floating mb-4 col-sm-12 mt-2">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap"
                        name="nama_siswa" value="{{ $data->nama_siswa }}" readonly>
                    <label for="floatingInput">Nama Lengkap</label>
                </div>
                <div class="mb-4 col-sm-2 text-white"><b>Jenis Kelamin</b></div>
                <div class="form-check mb-4 col-sm-2 text-white">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="L" disabled @if ($data->gender == 'L')
                    checked
                    @endif>
                    <label class="form-check-label" for="gender" >
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check mb-4 col-sm-4 text-white">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="P" disabled @if ($data->gender == 'P')
                    checked
                    @endif>
                    <label class="form-check-label" for="gender">
                        Perempuan
                    </label>
                </div>
                <div class="form-floating mb-4 col-sm-12">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Kota Lahir"
                        name="tempat_lahir" readonly>
                    <label for="floatingInput">{{ $data->tempat_lahir }}</label>
                </div>
                <label for="date" class="col-sm-2 mb-4 col-form-label text-white"><b>Tanggal Lahir</b></label>
                <div class="col-5 mb-2">
                    <div class="input-group date" id="datepicker">
                        <input type="date" class="form-control" id="date" name="tanggal_lahir"
                            value="{{ $data->tanggal_lahir }}" readonly />
                    </div>
                </div>
                <div class="form-floating mb-4 col-sm-12">
                    <input type="number" class="form-control" id="floatingInput" placeholder="NISN" name="nisn"
                        value="{{ $data->nisn }}" readonly>
                    <label for="floatingInput">Nomor Induk Siswa Nasional</label>
                </div>

                <label for="jurusan" class="col-sm-2 mb-5 col-form-label text-white"><b>Pilihan Jurusan 1</b></label>
                <div class="mb-4 col-sm-4 jurusan">
                    <select class="form-select jurusan" aria-label="Default select example" name="pilihan_jurusan_1">
                        <option selected>{{ $data->jurusan1->nama_jurusan }}</option>
                    </select>
                </div>
                <label for="jurusan" class="col-sm-2 mb-5 col-form-label text-white"><b>Pilihan Jurusan 2</b></label>
                <div class="mb-4 col-sm-4 jurusan">
                    <select class="form-select jurusan" aria-label="Default select example" name="pilihan_jurusan_2">
                        <option selected>{{ $data->jurusan2->nama_jurusan }}</option>
                    </select>
                </div>
                <label for="eskul" class="col-sm-2 mb-4 col-form-label text-white"><b>Pilihan eskul 1</b></label>
                <div class="mb-4 col-sm-4 eskul">
                    <select class="form-select eskul" aria-label="Default select example" name="pilihan_eskul_1">
                        <option selected>{{ $data->eskul1->nama_eskul }}</option>
                    </select>
                </div>
                <label for="eskul" class="col-sm-2 mb-4 col-form-label text-white"><b>Pilihan eskul 2</b></label>
                <div class="mb-4 col-sm-4 eskul">
                    <select class="form-select eskul" aria-label="Default select example" name="pilihan_eskul_2">
                        <option selected>{{ $data->eskul2->nama_eskul }}</option>

                    </select>
                </div>

                <div class="alert alert-secondary col-sm-12 mt-2">
                    <h4>Biodata Asal Sekolah Menengah Pertama</h4>
                </div>

                <div class="form-floating mb-4 col-sm-12 mt-3">
                    <input type="text" class="form-control " id="floatingInput" placeholder="Nama Asal Sekolah"
                        value="{{ $data->nama_asal_sekolah }}" name="nama_asal_sekolah">
                    <label for="floatingInput">Nama Asal Sekolah</label>
                </div>
                <div class="form-floating mb-4 col-sm-6">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Kota" name="kota"
                        value="{{ $data->kota }}">
                    <label for="floatingInput">Kota</label>
                </div>
                <div class="form-floating mb-4 col-sm-6">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Provins" name="provinsi"
                        value="{{ $data->provinsi }}">
                    <label for="floatingInput">Provinsi</label>
                </div>
                <div class="form-floating mb-4 col-sm-12">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Alamat Sekolah"
                        value="{{ $data->alamat_sekolah }}" name="alamat_sekolah">
                    <label for="floatingInput">Alamat Sekolah</label>
                </div>
                <div class="alert alert-secondary col-sm-12 mt-2">
                    <h4>Biodata Ayah</h4>
                </div>
                <div class="form-floating mb-4 col-sm-12 mt-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Ayah"
                        name="nama_ayah" value="{{ $data->nama_ayah }}">
                    <label for="floatingInput">Nama Ayah</label>
                </div>

                <div class="form-floating mb-4 col-sm-6 mt-3">
                    <input type="number" class="form-control " id="floatingInput" placeholder="Nomor Telphone"
                        name="no_telp_ayah" value="{{ $data->no_telp_ayah }}">
                    <label for="floatingInput">Nomor Telphone</label>
                </div>

                <div class="form-floating mb-4 col-sm-6 mt-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Pekerjaan"
                        name="pekerjaan_ayah" value="{{ $data->pekerjaan_ayah }}">
                    <label for="floatingInput">Pekerjaan</label>
                </div>
                <div class="form-floating mb-4 col-sm-6">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Alamat Rumah"
                        name="alamat_ayah" value="{{ $data->alamat_ayah }}">
                    <label for="floatingInput">Alamat Rumah</label>
                </div>
                <div class="alert alert-secondary col-sm-12 mt-2">
                    <h4>Biodata Ibu</h4>
                </div>
                <div class="form-floating mb-4 col-sm-12 mt-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Ibu"
                        name="nama_ibu" value="{{ $data->nama_ibu }}">
                    <label for="floatingInput">Nama Ibu</label>
                </div>

                <div class="form-floating mb-4 col-sm-6 mt-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="Nomor Telphone"
                        name="no_telp_ibu" value="{{ $data->no_telp_ibu }}">
                    <label for="floatingInput">Nomor Telphone</label>
                </div>

                <div class="form-floating mb-4 col-sm-6 mt-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Pekerjaan"
                        name="pekerjaan_ibu" value="{{ $data->pekerjaan_ibu }}">
                    <label for="floatingInput">Pekerjaan</label>
                </div>
                <div class="form-floating mb-4 col-sm-6">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Alamat Rumah"
                        name="alamat_ibu" value="{{ $data->alamat_ibu }}">
                    <label for="floatingInput">Alamat Rumah</label>
                </div>
            </div>

            <a href="/casis" class="btn btn-outline-light btn-lg rounded-pill mt-2 mb-3 w-100">Kembali</a>
        @endsection
