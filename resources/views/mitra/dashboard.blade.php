<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard Mitra</title>
        <link rel="stylesheet" href="{{ asset('css/mitra.css') }}">
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

        <h2>Dashboard Mitra</h2>

        <!-- Form tambah postingan -->
        <div class="iform">
            <form method="POST" action="/mitra/posts">
                @csrf
                <input type="text" name="title" placeholder="Judul" required>
                <input type="text" name="description" placeholder="Deskripsi" required>
                <input type="text" name="lokasi" placeholder="Lokasi" required>
                <select name="jurusan" required>
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="rpl">RPL</option>
                    <option value="aph">APH</option>
                    <option value="upw">UPW</option>
                    <option value="tb">TB</option>
                </select>
                <button type="submit" class="addButton">Tambah Postingan</button>
            </form>
        </div>

        <!-- Tabel postingan -->
        <table>
            <tr>
                <th>Judul</th>
                <th>Jurusan</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post->title ?></td>
                <td><?= strtoupper($post->jurusan) ?></td>
                <td><?= $post->lokasi ?></td>
                <td><?= $post->is_active ? 'Aktif' : 'Nonaktif' ?></td>
                <td>
                    <div class="edbtn">
                        <a href="{{ route('mitra.posts.edit', $post->id) }}" class="editButton">Edit</a>
                    </div>

                    <!-- Tombol Hapus -->
                    <form method="POST" action="/mitra/posts/<?= $post->id ?>" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

    </body>
</html>
