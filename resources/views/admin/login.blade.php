<!DOCTYPE html>
<html lang="en">

@if (Auth::guard("admin")->check())
<script>
    window.location.href = "/dashboard"
</script>
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin PPDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body> 
    <section>
        <div class="container mt-5 pt-5">
            <div class="raw">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body text-center">
                           <h2>AdminPPDB</h2>
                            @if(session('success'))
                                <p class="alert alert-success">{{ session('success') }}</p>
                            @endif
                            @if($errors->any())
                            @foreach($errors->all() as $err)
                                <p class="alert alert-danger">{{ $err }}</p>
                            @endforeach
                            @endif
                            <form action="/admin/login" method="post">
                                @csrf
                                <input type="text" name="username" class="form-control my-3 py-2"
                                    placeholder="Username" />
                                <input type="password" name="password" class="form-control my-3 py-2"
                                    placeholder="Password" />
                                <div class="text-center mt-3">
                                    <button name="submit" type="submit" class="btn btn-primary">Login</button>                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>


</html>