<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>

<div class="register-container">
    <h2>Register</h2>

    <form method="POST" action="/register">
        @csrf

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" placeholder="Masukkan nama" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>

        <button type="submit">Daftar</button>
    </form>

    <p class="login-link">
        Sudah punya akun? <a href="/">Login</a>
    </p>
</div>

</body>
</html>
