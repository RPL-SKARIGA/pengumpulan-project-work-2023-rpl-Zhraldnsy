@extends ('layout.side')
@section('tittle', 'Data Ekstrakurikuler')

@section('content')
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0 primary-text">Data Ekstrakurikuler</h2>
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
                            <i class="fas fa-user me-2 primary-text"> Admin</i>
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
        <div class="d-flex justify-content-between mb-3">
            <a href="/eskul-add" class="btn btn-outline-danger btn-lg rounded-pill mt-2  primary-text">Tambah
            Ekstrakurikuler</a>
            <form class="d-flex flex-row mt-2 " action="{{ route('eskul.index') }}" method="GET">
                <input class="form-control rounded-pill me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success " type="submit">Search</button>
            </form>
        </div>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50"><div class="d-flex justify-content-center">#</div></th>
                        <th scope="col">Nama Ekstarkulikuler</th>
                        <th scope="col" width="200"><div class="d-flex justify-content-center">Aksi</div></th>                   
                    </tr>
                </thead>

                <tbody>
                    @if (count($eskul) === 0)
                    <tr>
                        <td colspan="1"></td>
                        <td colspan="2" class="text-center"><b>Data tidak ditemukan</b></td> 
                    </tr>
                @else
                    <tbody>
                        @foreach ($eskul as $item)
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">{{ $loop->iteration }}</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">{{ $item->nama_eskul }}</div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-outline-danger me-3 btn-sm delete-eskul" data-id="{{ $item->id }}">Hapus</button>
                                        <a href="eskul-edit/{{$item->id }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Menggunakan event delegation untuk menangani klik tombol "Hapus"
            document.querySelector('.table').addEventListener('click', function (event) {
                if (event.target.classList.contains('delete-eskul')) {
                    const jurusanId = event.target.getAttribute('data-id');
                    
                    Swal.fire({
                        title: 'Hapus Ekstrakurikuler?',
                        text: 'Anda yakin ingin menghapus Ekstrakurikuler ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika pengguna mengonfirmasi, arahkan ke URL hapus
                            window.location.href = "/eskul-delete/" + jurusanId;
                        } else {
                            Swal.fire("Penghapusan dibatalkan", "", "error");
                        }
                    });
                }
            });
        });
    </script>
    @if($success = Session::get('success'))
    <script>
        Swal.fire({
        icon: "success",
        title: "",
        text: "{{ $success }}",
    });
    </script>
    @endif 
    @if($successedit = Session::get('successedit'))
        <script>
            Swal.fire({
            icon: "success",
            title: "",
            text: "{{ $successedit }}",
        });
        </script>
        @endif 
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
@endsection
