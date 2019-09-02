<?php

namespace App\Http\Controllers;

use Request;
use Session;
use App\forwader;
use App\Http\Requests;

class ForwaderController extends Controller
{
    public function index()
    {
        $row=forwader::all();
        $count=forwader::count();
        return view('simple/forwader/list_fwd',compact('row','count'));
    }
    public function create()
    {
        return view('simple/forwader/create_fwd');
    }
    public function store(Request $request)
    {
        forwader::create(Request::all());
        Session::flash('message', 'Forwader sukses disimpan pada tanggal'.' '.\Carbon\Carbon::now());
        Alert::success('Success!')->persistent("Close");
        return redirect('/forwader');
    }
    public function edit($id)
    {
        $row=forwader::FindOrFail($id);
        return view('simple/forwader/edit_fwd',compact('row'));
    }
    public function update(Request $request, $id)
    {
        forwader::FindOrFail($id)->update(Request::all());
        Session::flash('message', 'Shipment sukses diubah pada tanggal'.' '.\Carbon\Carbon::now());
        Alert::success('Success!')->persistent("Close");
        return redirect('/forwader');
    }
    public function del($id)
    {
        forwader::FindOrFail($id)->delete();
        Session::flash('message', 'Shipment sukses di hapus pada tanggal'.' '.\Carbon\Carbon::now());
        Alert::success('Success!')->persistent("Close");
        return redirect('/forwader');
    }
}
