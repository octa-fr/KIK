<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'mitra_id','title','description','jurusan','is_active','lokasi'
    ];

    public function mitra()
    {
        return $this->belongsTo(User::class, 'mitra_id');
    }

    public function requests()
    {
        return $this->hasMany(InternshipRequest::class);
    }

    public function edit($id) 
    {
        $post = Post::findOrFail($id);
        return view('mitra.post.edit', compact('post')); // <- sesuaikan foldermu
    }

}
