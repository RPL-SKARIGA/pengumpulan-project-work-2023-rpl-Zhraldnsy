@extends('layout.nav')
@section('tittle', 'Status')

@section('content')



    @if (!$data)
        <div class="alert alert-danger col-sm-12 mt-4 text-center">
            <h4>Maaf anda belum mengisi form pendaftaran <a href="/form">Daftar</a></h4>
        </div>
    @elseif($status == 'Belum Diterima')
        <div class="alert alert-danger col-sm-12 mt-4 text-center">
            <h4>Data anda masih dalam tahap pengkonfirmasian admin</h4>
        </div>
    @elseif($status == 'Ditolak')
    <div class="alert alert-danger col-sm-12 mt-4 text-center">
        <h4>Mohon maaf anda ditolak dari PPDB tahun ini, silahkan mendaftar ulang tahun depan</h4>
    </div>
    @else
        <div class="container my-3">
            <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                <div class="p-3 p-lg-5 pt-lg-3">
                    <div class="lc-block mb-3">
                        <div editable="rich">
                            <h2 class="fw-bold display-4">Selamat !!<p></p>
                                <p></p>
                            </h2>
                        </div>


                        <div class="lc-block mb-3">
                            <div editable="rich">
                                <p class="lead">
                                    Ananda {{ $nama }}, anda {{ $status }} di jurusan :
                                </p>
                            </div>
                        </div>

                        <div editable="rich">
                            <h4 class="fw-bold display-4">{{ $data->jurusan1->nama_jurusan }}<p></p>
                                <p></p>
                            </h4>
                        </div>

                        <div class="lc-block mb-2">
                            <div editable="rich">
                                <p class="lead">
                                    Ekstrakurikuler 1 : <b>{{ $data->eskul1->nama_eskul }}</b><br>
                                    Ekstrakurikuler 2 : <b>{{ $data->eskul2->nama_eskul }}</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif


@endsection
