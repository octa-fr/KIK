<!DOCTYPE html>
<html>
<head>
    <title>Admin - Permintaan Mitra</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<h2>Permintaan Mitra</h2>

@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Alasan</th>
        <th>Aksi</th>
    </tr>

    @forelse($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->mitra_reason }}</td>
            <td>
                <form method="POST" action="/admin/mitra-approve/{{ $user->id }}">
                    @csrf
                    <button type="submit">Setujui</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">Tidak ada permintaan</td>
        </tr>
    @endforelse
</table>

</body>
</html>
