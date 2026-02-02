<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
    <h2>Edit Postingan</h2>
<form method="POST" action="{{ route('mitra.posts.update', $post->id) }}">
    @csrf
    @method('PUT')
    
    <input type="text" name="title" value="{{ $post->title }}" required>
    <input type="text" name="description" value="{{ $post->description }}" required>
    <input type="text" name="lokasi" value="{{ $post->lokasi }}" required>
    
    <select name="jurusan" required>
        <option value="rpl" {{ $post->jurusan == 'rpl' ? 'selected' : '' }}>RPL</option>
        <option value="aph" {{ $post->jurusan == 'aph' ? 'selected' : '' }}>APH</option>
        <option value="upw" {{ $post->jurusan == 'upw' ? 'selected' : '' }}>UPW</option>
        <option value="tb" {{ $post->jurusan == 'tb' ? 'selected' : '' }}>TB</option>
    </select>
    
    <button type="submit">Update Postingan</button>
</form>
</body>
</html>

