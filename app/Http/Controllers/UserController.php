<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('core/admin/peserta', compact('data'));
    }
    public function create()
    {
        return view('core/admin/peserta_create');
    }
    public function store(UserRequest $request, User $user)
    {
        $user = new User;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();

        return redirect('/user')->with('status', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Peserta Sudah Ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }
    public function edit($id)
    {
        $user = User::where('user_id', $id)->first();
        return view('core/admin/peserta_edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required'],
            'username' => ['required'],
            'level' => ['required'],
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = ($request->password != null) ? Hash::make($request->password) : $user->password;
        $user->level = $request->level;
        $user->save();

        return redirect('/user')->with('status', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Peserta Sudah Diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/user')->with('status', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Peserta Sudah Dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }
}
