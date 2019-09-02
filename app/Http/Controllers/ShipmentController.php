<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Request;
use Auth;
use Alert;
use Excel;
use DB;
use Session;
use Datatables;
use App\ivfwd;
use App\shipment;
use App\currency;
use App\origin;
use App\suplier;
use App\forwader;
use App\User;
use App\quota;
use App\budget;
use App\data_upload;
use App\email;
use Redirect;
use Carbon\Carbon;

class ShipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->name === 'admin') {
            return redirect('/portal');
        }elseif(Auth::user()->name === 'kasir'){
            return redirect('/inventory/kasir');
        }elseif(Auth::user()->name === 'acc'){
            return Redirect::to('http://localhost/sptgl/public/login');
        }
        elseif(Auth::user()->name === 'ppic'){
            return redirect('/sj/dashboard');
        }elseif(Auth::user()->name === 'finance'){
            return redirect('/sj/dashboard');
        }elseif(Auth::user()->name === 'project'){
            return redirect('/sj/dashboard');
        }           
    }
    public function portal()
    {
        $currency=currency::pluck('currency','id');
        $forwader=forwader::pluck('namappjk','id');
        $origin=origin::pluck('origin','id');
        $supplier=suplier::pluck('suplier','id');
        $count=shipment::whereNull('aiia')->orWhere('aiia','0000-00-00')->count();
        $count_ok=shipment::whereNotNull('aiia')->Where('aiia','!=','0000-00-00')->count();
        $row=shipment::whereNull('aiia')->orWhere('aiia','0000-00-00')
        ->join('origin','origin.id','=','shipment.origin')
        ->join('forwader','forwader.id','=','shipment.forwader')
        ->join('suplier','suplier.id','=','shipment.supplier')
        ->get();
        if (isset($_GET[1])){
            dd(`$_GET[1]`);
        }
        return view('simple/shipment_list/portal',
        compact(['row','count','currency','forwader','origin','supplier','count_ok']));
    }                
    public function home()
    {
        $count=shipment::whereNull('aiia')->orWhere('aiia','0000-00-00')->count();
        $count_ok=shipment::whereNotNull('aiia')->Where('aiia','!=','0000-00-00')->count();
        $test=ivfwd::select('invoice')->get()->toArray();
        $row=shipment::whereNotNull('aiia')
        ->Where('aiia','!=','0000-00-00')
        ->join('origin','origin.id','=','shipment.origin')
        ->join('forwader','forwader.id','=','shipment.forwader')
        ->join('suplier','suplier.id','=','shipment.supplier')
        ->get();
        return view('simple/shipment_list/home',compact(['row','count','count_ok']));
    }
    public function done_ok()
    {
        $test=ivfwd::select('invoice')->get()->toArray();
        $row=shipment::whereNotNull('aiia')
        ->join('ivfwds', 'shipment.invoice','=','ivfwds.invoice')
        ->join('origin','origin.id','=','shipment.origin')
        ->join('forwader','forwader.id','=','shipment.forwader')
        ->join('suplier','suplier.id','=','shipment.supplier')
        ->groupBy('shipment.id')
        ->get();
        $count_ok_iv=count(\DB::table('shipment')->join('ivfwds', 'shipment.invoice','=','ivfwds.invoice')->select('shipment.*')->distinct()->get());
        $count_nok_iv=count(\DB::table('shipment')->whereNotIn('invoice',$test)->whereNotNull('aiia')->distinct()->get());
        return view('simple/shipment_list/done_ok_iv',compact(['row','count_ok_iv','count_nok_iv']));
    }   
    public function done_nok()
    {
        $test=ivfwd::select('invoice')->get()->toArray();
        $row=shipment::whereNotNull('aiia')
        ->where('aiia','!=','0000-00-00')
        ->whereNotIn('invoice',$test)
        ->join('origin','origin.id','=','shipment.origin')
        ->join('forwader','forwader.id','=','shipment.forwader')
        ->join('suplier','suplier.id','=','shipment.supplier')
        ->get();
        $count_ok_iv=count(\DB::table('shipment')->join('ivfwds', 'shipment.invoice','=','ivfwds.invoice')->select('shipment.*')->distinct()->get());
        $count_nok_iv=count(\DB::table('shipment')->whereNotIn('invoice',$test)->whereNotNull('aiia')->where('aiia','!=','0000-00-00')->distinct()->get());
        return view('simple/shipment_list/done_nok_iv',compact(['row','count_ok_iv','count_nok_iv']));
    }        
    public function print1($id)
    {
      function DateToIndo($date) {
      $romawi=[null,'I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
      $BulanIndo = array("Januari", "Februari", "Maret",
               "April", "Mei", "Juni",
               "Juli", "Agustus", "September",
               "Oktober", "November", "Desember");
      $tahun = substr($date, 0, 4);
      $bulan = substr($date, 5, 2);
      $tgl   = substr($date, 8, 2);
      $result = $tgl . " " . $BulanIndo[(int)$bulan] . " ". $tahun;
      $result_romawi = $romawi[(int)$bulan];
      return($result);
      }
      function Romawi($date) {
      $romawi=[null,'I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
      $bulan = substr($date, 5, 2);
      $result = $romawi[(int)$bulan];
      return($result);
      }      
      Excel::load('file/format_sk.xlsx',function($doc) use($id) {
        $row=shipment::join('suplier','suplier.id','=','shipment.supplier')
        ->select('shipment.id','suplier.suplier','shipment.sk_shipment','shipment.vessel',
            'shipment.invoice','shipment.invoice_date','shipment.bl','shipment.etd','shipment.amount',
            'shipment.gw','shipment.jml_kms','shipment.sat_kms')->where('invoice',$id)->get();
        
          $sheet = $doc->setActiveSheetIndex(0);
          foreach ($row as $rows) {            
            $sheet->setCellValue('G7', $rows->id);
            /*$sheet->setCellValue('G7', '/ SKPI /PUR/ AIIA /'.' '.Romawi(date('Y-m-d')).' '.'/'.' '.date('Y',strtotime($rows->etd)));*/
            /*$sheet->setCellValue('N3', '/ SKPD /PUR/ AIIA /'.' '.Romawi(date('Y-m-d')).' '.'/'.' '.date('Y',strtotime($rows->etd)));*/
            $sheet->setCellValue('E33', $rows->sk_shipment);
            $sheet->setCellValue('E35', $rows->suplier);
            $sheet->setCellValue('N1', $rows->vessel);
            $sheet->setCellValue('E36', $rows->invoice.' '.'/'.' '.DateToIndo($rows->invoice_date));
            $sheet->setCellValue('E37', $rows->bl.' '.'/'.' '.DateToIndo($rows->etd));
            $sheet->setCellValue('E38', number_format($rows->amount,2));
            $sheet->setCellValue('E39', $rows->gw.' / '.$rows->jml_kms.' '.$rows->sat_kms);
          }          
      })->download('xlsx');

    }
    public function store(Request $request)
    {
        $data=shipment::create(Request::all());
        DB::table('data_upload')->insert([
            ['id' => $data->id]
        ]);
        DB::table('email')->insert([
            ['id' => $data->id]
        ]);
        Session::flash('message', 'Shipment berhasil ditambahkan pada tanggal'.' '.\Carbon\Carbon::now());
        Alert::success('Success!')->persistent("Close");
        return redirect('/portal');
    }
    public function edit($id)
    {
        $currency=currency::pluck('currency','id');
        $forwader=forwader::pluck('namappjk','id');
        $origin=origin::pluck('origin','id');
        $supplier=suplier::pluck('suplier','id');
        $dept=budget::pluck('dept_name','id');
        $row=shipment::where('invoice',$id)->join('email','email.id','=','shipment.id')->firstOrFail();
        return view('simple/shipment_list/edit',compact('row','currency','forwader','origin','supplier','dept'));
    }
    public function update(Request $request, $id)
    {
        shipment::FindOrFail($id)->update(Request::all());
        Session::flash('message', 'Shipment sukses diubah pada tanggal'.' '.\Carbon\Carbon::now());
        Alert::success('Success!')->persistent("Close");
        return redirect('/portal');
    }
    public function update2(Request $request, $id)
    {
        email::FindOrFail($id)->update(Request::all());
        Session::flash('message', 'Shipment sukses diubah pada tanggal'.' '.\Carbon\Carbon::now());
        Alert::success('Success!')->persistent("Close");
        return redirect('/portal');
    }
    public function del($id)
    {
        shipment::where('invoice',$id)->delete();
        Session::flash('message', 'Shipment berhasil dihapus pada tanggal'.' '.\Carbon\Carbon::now());
        Alert::success('Success!')->persistent("Close");
        return redirect('/home');
    }
    public function upload($id)
    {
      $row=shipment::FindOrFail($id);
      return view('simple/shipment_list/upload_file',compact('row'));
    }
    public function upload_data(Request $request, $id)
    {
        $row=data_upload::FindOrFail($id);
        $rows=shipment::FindOrFail($id);
        if(request()->file('invoice_file')==null){
            $row->invoice_file=null;
            }else{    
            request()->file('invoice_file')->storeAs('public/'.$rows->invoice,'invoice.pdf');
            $row->invoice_file='invoice.pdf';
        }
        if(request()->file('packing_list')==null){
            $row->packing_list=null;
        }else{
            request()->file('packing_list')->storeAs('public/'.$rows->invoice,'packing_list.pdf');
            $row->packing_list='packing_list.pdf';
        }       
        if(request()->file('bl_file')==null){
            $row->bl_file=null;
        }else{
            request()->file('bl_file')->storeAs('public/'.$rows->invoice,'bl.pdf');   
            $row->bl_file='bl.pdf'; 
        }
        if(request()->file('mbl')==null){
            $row->mbl=null;
        }else{
            request()->file('mbl')->storeAs('public/'.$rows->invoice,'mbl.pdf');
            $row->mbl='mbl.pdf';
        }
        if(request()->file('insurance')==null){
            $row->insurance=null;
        }else{
            request()->file('insurance')->storeAs('public/'.$rows->invoice,'insurance.pdf'); 
            $row->insurance='insurance.pdf';
        }
        if(request()->file('coo')==null){
            $row->coo=null;
        }else{
            request()->file('coo')->storeAs('public/'.$rows->invoice,'coo.pdf');  
            $row->coo='coo.pdf';
        }
        
        if(request()->file('bpn_billing')==null){
            $row->bpn_billing=null;
        }else{
          request()->file('bpn_billing')->storeAs('public/'.$rows->invoice,'bpn_billing.pdf');  
          $row->bpn_billing='bpn_billing.pdf';
        }  
        $row->save();
        Session::flash('message', 'Sukses Upload Data pada tanggal'.' '.\Carbon\Carbon::now());
        Alert::success('Success!')->persistent("Close");
        return redirect('/inventory');
    }
    public function show($id)
    {
      $rows=shipment::where('invoice',$id)->get();
      $row=ivfwd::where('invoice',$rows[0]->invoice)->get();
      $invoice_total=ivfwd::where('invoice',$rows[0]->invoice)->sum('amount_fwd');      
      return view('simple/shipment_list/show',compact('rows','row','invoice_total'));
    }                    
    public function inventory_kasir()
    {
        $count=shipment::all()->count();
        $row=shipment::join('data_upload','data_upload.id','=','shipment.id')->get();
        return view('simple/shipment_list/inventory_kasir',compact(['row','count']));
    }
    public function inventory()
    {
        $count=shipment::all()->count();
        $row=shipment::join('data_upload','data_upload.id','=','shipment.id')->get();
        return view('simple/shipment_list/inventory',compact(['row','count']));
    }    
    public function email($id)
    {
        $row=shipment::join('email','email.id','=','shipment.id')
        ->join('suplier','suplier.id','=','shipment.supplier')
        ->where('shipment.invoice',$id)->get();
        if($row[0]->dept=='1'){
        $user_to=['ppic.receiving@aiia.co.id','consumable@aiia.co.id'];
        $user_cc=['exim@aiia.co.id','dicky.adrian@aiia.co.id','bambang.prayoga@aiia.co.id','rizal.fahlepi@aiia.co.id','satria.laksono@aiia.co.id'];
        \Mail::send('emails.notif', ['row' => $row,'user_cc' => $user_cc, 'user_to' => $user_to], function ($m) use ($row,$user_cc,$user_to) {
            $m->from('exim@aiia.co.id', 'SIMPLE');
            $m->to($user_to)
            ->cc($user_cc)
            ->subject('SIMPLE-Daily Shipment Report Real Time (No-Reply)');
        });
        }elseif($row[0]->dept=='2'){
        $user_to=['ppic.unit.receiving@aiia.co.id','ppic.unit.consumable@aiia.co.id'];
        $user_cc=['exim@aiia.co.id','dicky.adrian@aiia.co.id','bambang.prayoga@aiia.co.id','saiful.safari@aiia.co.id','faqih@aiia.co.id'];
        \Mail::send('emails.notif', ['row' => $row,'user_cc' => $user_cc, 'user_to' => $user_to], function ($m) use ($row,$user_cc,$user_to) {
            $m->from('exim@aiia.co.id', 'SIMPLE');
            $m->to($user_to)
            ->cc($user_cc)
            ->subject('SIMPLE-Daily Shipment Report Real Time (No-Reply)');
        });
    }
        return view('emails/notif',compact('row'));
    }
    public function email2()
    {
        $user_to=['exim@aiia.co.id'];
        $user_cc=['exim@aiia.co.id'];
        \Mail::send('emails.notif', ['user_cc' => $user_cc, 'user_to' => $user_to], function ($m) use ($user_cc,$user_to) {
            $m->from('exim@aiia.co.id', 'SIMPLE');
            $m->to($user_to)
            ->cc($user_cc)
            ->subject('SIMPLE-Daily Shipment Report Real Time (No-Reply)');
        });        
        return view('emails/notif');
    }    
    public function report()
    {
        return view('simple/shipment_list/report');
    }
    public function intransit()
    {
        $row=shipment::whereNull('aiia')->orWhere('aiia','0000-00-00')->whereMonth('etd',$_GET['bulan'])
        ->whereYear('etd',$_GET['tahun'])
        ->join('forwader','forwader.id','=','shipment.forwader')
        ->join('origin','origin.id','=','shipment.origin')
        ->join('suplier','suplier.id','=','shipment.supplier')
        ->join('currency','currency.id','=','shipment.currency')
        ->get();
        return view('simple/shipment_list/view_report',compact('row'));
    }
    public function report_etd()
    {
        $row=shipment::whereMonth('etd',$_GET['bulan'])
        ->whereYear('etd',$_GET['tahun'])
        ->join('forwader','forwader.id','=','shipment.forwader')
        ->join('origin','origin.id','=','shipment.origin')
        ->join('suplier','suplier.id','=','shipment.supplier')
        ->join('currency','currency.id','=','shipment.currency')
        ->get();
        return view('simple/shipment_list/view_report',compact('row'));
    }
    public function report_ata()
    {
        $row=shipment::whereMonth('aiia',$_GET['bulan'])
        ->whereYear('aiia',$_GET['tahun'])
        ->join('forwader','forwader.id','=','shipment.forwader')
        ->join('origin','origin.id','=','shipment.origin')
        ->join('suplier','suplier.id','=','shipment.supplier')
        ->join('currency','currency.id','=','shipment.currency')
        ->get();
        return view('simple/shipment_list/view_report',compact('row'));
    }

    public function quota()
    {
        $row=quota::all();
        return view('quota',compact('row'));
    }
    public function email_quota()
    {
        $row=quota::all();
        $user_to=['bambang.prayoga@aiia.co.id'];
        $user_cc=['exim@aiia.co.id','dicky.adrian@aiia.co.id','irawan.hendro@aiia.co.id'];
        \Mail::send('emails.notif', ['row' => $row,'user_cc' => $user_cc, 'user_to' => $user_to], function ($m) use ($row,$user_cc,$user_to) {
            $m->from('exim@aiia.co.id', 'SIMPLE QUOTA');
            $m->to($user_to)
            ->cc($user_cc)
            ->subject('SIMPLE Quota PI Besi Baja (No-Reply)');
        });
        return view('emails/notif',compact('row'));
}
    public function email_quota2()
    {
        $row=quota::all();
        return view('emails/notif',compact('row'));
    }
}