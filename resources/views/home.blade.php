@extends('layout.nav')
@section('tittle', 'Home')
@section('content')

        <div class="container my-3">
            <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                    <div class="lc-block mb-3">
                        <div editable="rich">
                            <h2 class="fw-bold display-4">PPDB SMK 2023<p></p>
                                <p></p>
                            </h2>
                        </div>
                    </div>
    
                    <div class="lc-block mb-3">
                        <div editable="rich">
                            <p class="lead">
                                Ayo kita jadikan hari ini langkah pertama menuju kesuksesan. Bergabunglah dengan SMK 01 Prindapan  dan mulailah perjalanan pendidikanmu!.
                                Jangan lewatkan kesempatan untuk berkembang secara akademik dan pribadi. Tunjukan dan temukan potensimu di SMK 01 Prindapan ! Kami siap membantu kamu meraih suksesan.
                        </div>
                    </div>
    
                    <div class="lc-block d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="{{route('siswa.index')}}" type="submit" class="btn btn-outline-dark btn-lg rounded-pill mt-4 mb-3 w-50">Daftar Sekarang</a href="{{route('siswa.index')}}">                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                    <div class="lc-block"><img class="rounded-start" src="assets/img/UN.jpg" alt="PhotoLogo" width="400"></div>
                </div>
            </div>
        </div>
        
        @if($success = Session::get('success'))
        <script>
            Swal.fire({
            icon: "success",
            title: "Status Konfirmasi Bisa di Lihat di Halaman Status",
            text: "{{ $success }}",
        });
        </script>
        @endif 
        @if($successlogin = Session::get('successlogin'))
        <script>
            Swal.fire({
            icon: "success",
            title: "",
            text: "{{ $successlogin }}",
        });
        </script>
        @endif 
        @if($successregister = Session::get('successregister'))
        <script>
            Swal.fire({
            icon: "success",
            title: "",
            text: "{{ $successregister }}",
        });
        </script>
        @endif 
@endsection


