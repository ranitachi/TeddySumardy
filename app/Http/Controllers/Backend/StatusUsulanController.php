<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\StatusUsulan;
use Validator;
use Auth;
use DB;

class StatusUsulanController extends Controller
{
    public function index()
    {
        $status_usulan = StatusUsulan::all();

        return view('backend.pages.status-usulan.index')->with('status_usulan', $status_usulan);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'status' => 'required',
        ])->validate();

        $insert = StatusUsulan::create($request->all());

        return redirect()->route('status-usulan.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        return StatusUsulan::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'status' => 'required',
        ])->validate();

        $update = StatusUsulan::find($id)->update($request->all());

        return redirect()->route('status-usulan.index')
            ->with('success', 'Anda telah mengubah data status usulan kerjasama.');
    }

    public function destroy($id)
    {
        StatusUsulan::destroy($id);

        return redirect()->route('status-usulan.index')
            ->with('success', 'Anda telah menghapus data status usulan kerjasama.');
    }
}
