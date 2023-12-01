@extends ('layout.side')
@section ('tittle', 'Admin')

@section('content')
<div id="page-content-wrapper">
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <div class="d-flex align-items-center"> <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0 primary-text">Dashboard</h2> </div> <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle primary-text fw-bold" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-2 primary-text"></i><span class="primary-text">Admin</span>
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

<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$countcasis}}</h3>
                    <p class="fs-5">Calon Siswa</p>
                </div>
                <i class="fas fa-gift fs-1 icon-color border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$countsiswa}}</h3>
                    <p class="fs-5">Siswa Baru</p>
                </div>
                <i class="fas fa-hand-holding-usd fs-1 icon-color border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$countjur}}</h3>
                    <p class="fs-5">Jurusan</p>
                </div>
                <i class="fas fa-truck fs-1 icon-color border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$counteskul}}</h3>
                    <p class="fs-5">Ekstrakurikuler</p>
                </div>
                <i class="fas fa-chart-line fs-1 icon-color border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
    </div>

    <div class="row my-5">
        
        <div class="d-flex justify-content-between">
            <h3 class="fs-4 mb-3 mt-3 primary-text">Data Siswa Baru</h3>
            <form class="d-flex flex-row mt-2 mb-3" action="{{ route('admin.index') }}" method="GET">
                <input class="form-control rounded-pill me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success " type="submit">Search</button>
            </form>
        </div>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">NIS</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Eskul</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($sisbar) === 0)
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="1" class="text-center"><b>Tidak ada data</b></td> 
                    </tr>
                @else
                    @foreach ($sisbar as $item)
                    <tr>
                        <th scope="row">{{$item->nis}}</th>
                        <td>{{$item->calonsiswa->nama_siswa}}</td>
                        <td>{{$item->calonsiswa->jurusan1->nama_jurusan}}</td>
                        <td>{{$item->calonsiswa->eskul1->nama_eskul}}</td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
        </div>
    </div>

</div>
</div>
</div>
<!-- /#page-content-wrapper -->
</div>

<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>
@endsection