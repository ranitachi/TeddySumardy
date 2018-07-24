<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Hash;
use App\User;
use Validator;
use App\Models\Ventura;

class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::all();
        $ventura = Ventura::all();
        
        return view('backend.pages.pengguna.index')
            ->with('ventura', $ventura)
            ->with('users', $users);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required|confirmed',
        ])->validate();

        $insert = new User;
        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->password = Hash::make($request->password);
        $insert->level = $request->level;
        $insert->id_ventura = $request->id_ventura;
        $insert->save();

        return redirect()->route('pengguna.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        return User::find($id);
    }

    public function update(Request $request, $id)
    {
        if (is_null($request->password) || is_null($request->password_confirmation)) {
            Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'level' => 'required',
            ])->validate();

            $update = User::find($id);
            $update->name = $request->name;
            $update->email = $request->email;
            $update->level = $request->level;
            $update->id_ventura = $request->id_ventura;
            $update->save();

            return redirect()->route('pengguna.index')
                ->with('success', 'Anda telah mengubah data pengguna.');
        }

        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required|confirmed',
        ])->validate();

        $update = User::find($id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->password = Hash::make($request->password);
        $update->level = $request->level;
        $update->id_ventura = $request->id_ventura;
        $update->save();

        return redirect()->route('pengguna.index')
            ->with('success', 'Anda telah mengubah data pengguna.');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('pengguna.index')
            ->with('success', 'Anda telah menghapus data pengguna.');
    }
}
