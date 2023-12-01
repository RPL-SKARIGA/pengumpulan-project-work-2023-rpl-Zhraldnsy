@extends ('layout.side')
@section('tittle', 'Data Siswa Baru')

@section('content')
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0 primary-text">Data Siswa Baru</h2>
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
        <div class="d-flex justify-content-end">
            <form class="d-flex flex-row mt-2 mb-3" action="{{ route('siswabaru.index') }}" method="GET">
                <input class="form-control rounded-pill me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success " type="submit">Search</button>
            </form>
        </div>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="100">
                            <div class="d-flex justify-content-center">#</div>
                        </th>
                        <th scope="col ">Nomor Induk Sekolah</th>
                        <th scope="col">Nama Siswa Baru</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Diterima pada tanggal</th>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($siswabaru) === 0)
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="1" class="text-center"><b>Tidak ada data</b></td> 
                    </tr>
                @else
                    <tbody>
                        @foreach ($siswabaru as $item)
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">{{ $loop->iteration }}</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">{{$item->nis}}</div>
                                </td>
                                <td>
                            <div class="d-flex align-items-center">{{$item->calonsiswa->nama_siswa}}</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">{{$item->calonsiswa->jurusan1->nama_jurusan}}</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">{{$item->created_at}}</div>
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
                        title: 'Hapus Data Calon Siswa ?',
                        text: 'Anda yakin ingin menghapus Data Calon Siswa ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika pengguna mengonfirmasi, arahkan ke URL hapus
                            window.location.href = "/casis-delete/" + casisId;
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
    @if($success = Session::get('successkonfirmasi'))
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
