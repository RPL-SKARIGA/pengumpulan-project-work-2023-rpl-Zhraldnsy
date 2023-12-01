<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="<?= url('assets/css/stylesheet.css')?>" />
    <title>Dashboard | @yield ('tittle')</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i> ADMIN PPDB</div>
            <div class="list-group list-group-flush my-3">
                <a href="{{ url('/dashboard') }}" class="list-group-item bg-transparent primary-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{route('casis.show')}}" class="list-group-item list-group-item-action bg-transparent primary-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Data Calon Siswa</a>
                <a href="{{route('siswabaru.index')}}" class="list-group-item list-group-item-action bg-transparent primary-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Data Siswa Baru</a>
                <a href="/jurusan" class="list-group-item list-group-item-action bg-transparent primary-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Data Jurusan</a>
                <a href="/eskul" class="list-group-item list-group-item-action bg-transparent primary-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Data Ekskul </a>

                <a href="/adminlogout" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <div class="container">
            @yield ('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>