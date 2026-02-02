<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\InternshipRequest;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function dashboard()
    {
        $posts = auth()->user()->posts()->with('requests.user')->get();
        return view('mitra.dashboard', compact('posts'));
    }

    public function accept($id)
    {
        InternshipRequest::where('id',$id)
            ->update(['status'=>'accepted']);
        return back();
    }

    public function reject($id)
    {
        InternshipRequest::where('id',$id)
            ->update(['status'=>'rejected']);
        return back();
    }
}

