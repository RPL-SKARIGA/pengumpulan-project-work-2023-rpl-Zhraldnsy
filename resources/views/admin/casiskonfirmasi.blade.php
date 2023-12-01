@extends ('layout.side')
@section('tittle', 'Konfirmasi Calon Siswa')

@section('content')
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0 primary-text">Konfirmasi Calon Siswa</h2>
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
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">
                            <div class="d-flex justify-content-center">#</div>
                        </th>
                        <th scope="col">Nama Calon Siswa</th>
                        <th scope="col">Jurusan 1</th>
                        <th scope="col">Jurusan 2</th>
                        <th scope="col">Ekskul 1</th>
                        <th scope="col">Ekskul 2</th>
                        <th scope="col">Status</th>

                        <th scope="col" width="200">
                            <div class="d-flex justify-content-center">Aksi</div>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($calonsiswa) === 0)
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="3" class="text-center"><b>Tidak ada data</b></td> 
                    </tr>
                @else
                    <tbody>
                        @foreach ($calonsiswa as $item)
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">{{ $loop->iteration }}</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">{{$item->nama_siswa}}</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">{{$item->jurusan1->nama_jurusan}}</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">{{$item->jurusan2->nama_jurusan}}</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">{{$item->eskul1->nama_eskul}}</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">{{$item->eskul2->nama_eskul}}</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">{{$item->status_konfirmasi}}</div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-outline-danger me-3 btn-sm delete-casis" data-id="{{ $item->id }}">Tolak</button>
                                        <a href="konfirmasicasis/{{$item->id}}" class="btn btn-outline-success me-3 btn-sm">Konfirmasi</a>
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
                if (event.target.classList.contains('delete-casis')) {
                    const casisId = event.target.getAttribute('data-id');
                    
                    Swal.fire({
                        title: 'Tolak Calon Siswa ?',
                        text: 'Anda yakin ingin Menolak Data Calon Siswa ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Tolak!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika pengguna mengonfirmasi, arahkan ke URL hapus
                            window.location.href = "/casis-delete/" + casisId;
                        } else {
                            Swal.fire("Penolakan dibatalkan", "", "error");
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
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
@endsection
