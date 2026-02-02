<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\InternshipRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $posts = Post::where('is_active',true)->with('mitra')->get();
        $myRequests = InternshipRequest::where('user_id',auth()->id())->get();

        return view('user.dashboard', compact('posts','myRequests'));
    }

    public function apply($postId)
    {
        InternshipRequest::create([
            'post_id'=>$postId,
            'user_id'=>auth()->id()
        ]);

        return back();
    }

    public function requestMitra(Request $request)
    {
        $request->validate([
            'mitra_reason' => 'required'
        ]);

        $user = auth()->user();

        $user->update([
            'mitra_reason' => $request->mitra_reason,
            'mitra_verified' => false,
        ]);

        return back()->with('success', 'Permintaan mitra berhasil dikirim');
    }

}