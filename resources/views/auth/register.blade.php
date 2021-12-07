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
    <title>Register</title>
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
                <form action="{{ route('daftar') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">No HP</label>
                        <input type="number" name="no_hp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Induk</label>
                        <input type="number" name="no_induk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" id="" class="form-control">
                            <option value="">Pilih Role...</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            {{-- <option value="admin">Admin</option> --}}
                            <option value="dosen">Dosen</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                Sudah Punya Akun? <a href="{{ route('login') }}">Masuk</a>
            </div>
        </div>
    </div>
</body>
</html>
