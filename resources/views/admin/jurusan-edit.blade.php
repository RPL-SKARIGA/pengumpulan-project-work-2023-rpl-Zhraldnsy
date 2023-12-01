@extends ('layout.side')
@section('tittle', 'Admin')

@section('content')

<h2 style="width: 100%; border-bottom: 4px solid #687EFF; margin-top: 45px; "><b class="primary-text ">Form Edit
    Jurusan</b></h2>
<form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
<div class="form-floating mb-3 col-sm-12 mt-3">
    <input type="text" class="form-control  @error('nama_jurusan') is-invalid @enderror" id="floatingInput" placeholder="Nama Jurusan" name="nama_jurusan"
        value="{{$jurusan->nama_jurusan}}">
    <label for="floatingInput">Nama Jurusan</label>
    @error('nama_jurusan')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="d-flex">
    <button type="submit"
        class="btn btn-outline-light me-3 btn-lg rounded-pill mt-2 mb-3 w-100 primary-text">Edit</button>
    <a href="/jurusan" class="btn btn-outline-danger btn-lg rounded-pill mt-2 mb-3 w-100 primary-text">Batal</a>
</div>
</form>

@endsection