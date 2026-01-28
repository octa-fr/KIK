<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Panggil CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
    <body>

        <div class="login-container">
            <h2>Login</h2>

            <form method="POST" action="/login">
                @csrf

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Masukkan email" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" required>
                </div>

                <button type="submit">Login</button>
            </form>

            <p class="register-link">
                Belum punya akun? <a href="/register">Daftar</a>
            </p>
        </div>

    </body>
</html>
