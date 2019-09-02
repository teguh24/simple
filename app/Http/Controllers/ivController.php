<?php

namespace App\Http\Controllers;

use Request;
use Redirect;
use DB;
use Alert;
use App\ivfwd;
use App\shipment;
use App\Http\Requests;

class ivController extends Controller
{
    
    public function index($id)
    {
        $row=shipment::where('invoice',$id)->get();
        $data=ivfwd::where('invoice',$row[0]->invoice)->get();
        $test1=DB::table('shipment')->join('ivfwds', 'shipment.invoice','!=','ivfwds.invoice')->select('shipment.invoice')->distinct()->get()->toArray();
        return view('simple/forwader/create_iv_fwd',compact('row','data'));

    }
    public function store(Request $request, $id)
    {
        ivfwd::create(Request::all());
        return back();
    }
    public function edit($id)
    {
        $row=ivfwd::FindOrFail($id);
        return view('simple/forwader/edit_iv_fwd',compact('row'));
    }
    public function update(Request $request, $id)
    {
        ivfwd::FindOrFail($id)->update(Request::all());
        Alert::success('Success!')->persistent("Close");
        return redirect('/done');
    }
    public function destroy($id)
    {
        ivfwd::FindOrFail($id)->delete();
        Alert::success('Success!')->persistent("Close");
        return back();
    }
}
