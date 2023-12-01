@extends ('layout.side')
@section('tittle', 'Admin')

@section('content')

<h2 style="width: 100%; border-bottom: 4px solid #687EFF; margin-top: 45px; "><b class="primary-text ">Form Edit
    Eskul</b></h2>
<form action="{{ route('eskul.update', $eskul->id) }}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
<div class="form-floating mb-3 col-sm-12 mt-3">
    <input type="text" class="form-control @error('nama_eskul') is-invalid @enderror" id="floatingInput" placeholder="Nama Eskul" name="nama_eskul"
        value="{{$eskul->nama_eskul}}">
    <label for="floatingInput">Nama Eskul</label>
    @error('nama_eskul')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="d-flex">
    <button type="submit"
        class="btn btn-outline-light me-3 btn-lg rounded-pill mt-2 mb-3 w-100 primary-text">Edit</button>
    <a href="/eskul" class="btn btn-outline-danger btn-lg rounded-pill mt-2 mb-3 w-100 primary-text">Batal</a>
</div>
</form>

@endsection