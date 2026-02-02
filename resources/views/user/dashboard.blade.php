<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard User</title>
        <link rel="stylesheet" href="{{ asset('css/user.css') }}">
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    </head>
    <body>
        <div class="navbar">
            <div class="nav-left">
                Halo, <strong>{{ auth()->user()->name }}</strong>
            </div>

            <div class="nav-right">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>

        <div class="title">
            <h2>Lowongan Magang</h2>
        </div>

        <div class="cards">
            <?php foreach ($posts as $post): ?>
                <div class="card">
                    <h3><?= $post->title ?></h3>
                    <p><?= $post->description ?></p>
                    <small>Jurusan: <?= strtoupper($post->jurusan) ?></small>
                    <small>Lokasi: <?= $post->lokasi ?></small>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>
