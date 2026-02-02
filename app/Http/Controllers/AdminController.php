<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function verifyMitra($id)
    {
        User::where('id',$id)->update([
            'role' => 'mitra',
            'mitra_verified' => true
        ]);

        return back();
    }

    public function mitraRequests()
    {
        $users = User::where('role', 'user')
            ->whereNotNull('mitra_reason')
            ->where('mitra_verified', false)
            ->get();

        return view('admin.mitra_requests', compact('users'));
    }

    public function approveMitra($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'role' => 'mitra',
            'mitra_verified' => true,
        ]);

        return back()->with('success', 'User berhasil disetujui menjadi mitra');
    }

}

