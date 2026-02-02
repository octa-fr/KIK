<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    {{-- Navbar --}}
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

    <h2>Dashboard Admin</h2>

    <div class="tabel">
        <table>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
            </tr>

            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
