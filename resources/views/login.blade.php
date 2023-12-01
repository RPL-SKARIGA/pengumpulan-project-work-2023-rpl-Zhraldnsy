<!doctype html>
<html lang="en">
    @if (Auth::check())
    <script>
        window.location.href = "/"
    </script>
    @endif
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>PPDB SMK 2023 | Login</title>
</head>

<body>

    <!-- blue circle background -->
    <div class="d-none d-md-block ball login bg-primary bg-gradient position-absolute rounded-circle mt-3"></div>

    <!-- Login Section -->
    <form action="/login" method="post"> {{-- memanggil route login di file web --}}
        @csrf
        <div class="container login__form active">
            <div class="row vh-100 w-100 align-self-center">
                <div class="col-12 col-lg-6 col-xl-6 px-5">
                    <div class="row vh-100">
                        <div class="col align-self-center p-5 w-100">
                            <h3 class="fw-bolder">WELCOME BACK !</h3>
                            <p class="fw-lighter fs-6">Don't have an account, <span id="signUp" role="button"
                                    class="text-primary">Sign Up</span></p>
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif {{-- menampilkan pesan error jika password dan usn tidak valid --}}

                            <!-- form login section -->
                            <form action="" class="mt-4">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text"
                                        class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3 @error('username') is-invalid @enderror"
                                        placeholder="Username" name="username">
                                    @error('username')
                                        <div class="invalid-feedback ms-3">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="d-flex position-relative">
                                        <input type="password"
                                            class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3 @error('password') is-invalid @enderror"
                                            name="password">
                                        <span class="password__icon text-primary fs-4 fw-bold bi bi-eye-slash"></span>
                                    </div>

                                </div>
                                <div class="col text-center">
                                    <button type="submit"
                                        class="btn btn-outline-dark btn-lg rounded-pill mt-4 w-100">Login</button>
                                </div>
                            </form>
                            <p class="mt-5 text-center">Or Sign in with social platforms</p>
                            <div class="row text-center">
                                <div class="col mt-3">
                                    <a href="" class="btn btn-outline-dark border-2 rounded-circle"><i
                                            class="bi bi-facebook fs-5"></i></a>
                                </div>
                                <div class="col my-3">
                                    <a href="" class="btn btn-outline-dark border-2 rounded-circle"><i
                                            class="bi bi-google fs-5"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-6 col-xl-6 p-5">
                    <div class="row vh-100 p-9">
                        <div class="col align-self-center p-9 text-center">
                            <img src="assets/img/login2.svg" class="bounce" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Register Section -->
    <form action="/create" method="post"> {{-- memanggil route register di file web --}}
        @csrf
        <div class="container register__form">
            <div class="row vh-100 w-100 align-self-center">
                <div class="d-none d-lg-block col-lg-6 col-xl-6 p-5">
                    <div class="row vh-100 p-5">
                        <div class="col align-self-center p-5 text-center">
                            <img src="assets/img/register1.svg" class="bounce" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-6 px-5">
                    <div class="row vh-100">
                        <div class="col align-self-center p-5 w-100">
                            <h3 class="fw-bolder">REGISTER HERE !</h3>
                            <p class="fw-lighter fs-6">Have an account, <span id="signIn" role="button"
                                    class="text-primary">Sign In</span></p>
                            <!-- form register section -->
                            <form action="/create" class="mt-2">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Name</label>
                                    <input type="text"
                                        class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3 @error('nama') is-invalid @enderror"
                                        placeholder="name example" name="nama">
                                    @error('nama')
                                        <div class="invalid-feedback ms-3">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text"
                                        class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3 @error('username') is-invalid @enderror"
                                        placeholder="username" name="username">
                                    @error('username')
                                        <div class="invalid-feedback ms-3">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Email</label>
                                    <input type="email"
                                        class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3 @error('email') is-invalid @enderror"
                                        placeholder="name@example.com" name="email">
                                    @error('email')
                                        <div class="invalid-feedback ms-3">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="username" class="form-label">Password</label>
                                    <div class="d-flex position-relative">
                                        <input type="password"
                                            class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3 @error('password') is-invalid @enderror"
                                            name="password">
                                        <span class="password__icon text-primary fs-4 fw-bold bi bi-eye-slash"></span>
                                    </div>
                                </div>
                                <div class="col text-center">
                                    <button type="submit"
                                        class="btn btn-outline-dark btn-lg rounded-pill mt-4 w-100">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="assets/js/script.js"></script>

    @if ($logout = Session::get('logout'))
        <script>
            Swal.fire({
                icon: "success",
                title: "",
                text: "{{ $logout }}",
            });
        </script>
    @endif
</body>

</html>
