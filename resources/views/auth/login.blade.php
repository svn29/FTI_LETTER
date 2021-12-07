<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="email.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <title>Login</title>
</head>
<style>
    body {
    width: 100%;
    min-height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(ukdw.jpg);
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<body>
    <div class="container mx-auto">
        <div class="card mx-auto" style="width: 35rem">
            <div class="card-header" style="font-size:50px;">
                <center>Login</center>
            </div>
            <div class="card-body">
                <form action="{{ route('masuk') }}" method="POST">
                    @csrf
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{$message}}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="">ID</label>
                        <input type="number" name="no_induk" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                Belum Buat Akun? <a href="{{ route('register') }}">Daftar</a>
            </div>
        </div>
    </div>
</body>
</html>
