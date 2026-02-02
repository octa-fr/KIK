@extends('layouts.app')
@section('title','Kelola User')

@section('content')
<h2>Data User</h2>

@foreach($users as $user)
<div class="card">
    <b>{{ $user->name }}</b> ({{ $user->role }})

    @if($user->role === 'user' && !$user->mitra_verified)
        <form method="POST" action="/admin/verify-mitra/{{ $user->id }}">
            @csrf
            <button>Setujui Jadi Mitra</button>
        </form>
    @endif
</div>
@endforeach
@endsection
