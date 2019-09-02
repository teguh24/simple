@extends('layouts.app')

@section('content')
<body background="/img/bg.jpg">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"><big><big><big><font face="calibri">EDIT SHIPMENT</font></big></big></big>
                    </div>
                <div class="panel-body">
                  <font face="calibri">
        {!! Form::model($row,['action' => ['ShipmentController@update',$row->id],'method' => 'put','class'=>'form-horizontal', 'id'=>'myform']) !!}
            <div class="col-md-6">
            <div class="form-group">            
            {{Form::label(null, 'SK Shipment',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-8">
            {{Form::text('sk_shipment',null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Vessel',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-6">
            {{Form::text('vessel',null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Shipment',['class'=>'col-sm-2 control-label'])}}
            <div class="col-sm-4">
            {{Form::select('shipment', 
            ['CKD' => 'CKD', 'Seat Motor' => 'Seat Motor',
            'Ball Bearing'=> 'Ball Bearing','Shaft Oil Pump'=>'Shaft Oil Pump',
            'Rotor Water Pump'=>'Rotor Water Pump','Plug Oil Pump'=>'Plug Oil Pump',
            'Antenna'=>'Antenna','Gasket'=>'Gasket','Housing Camshaft'=>'Housing Camshaft','Case FR'=>'Case FR'
            ,'Lever'=>'Lever','Actuator'=>'Actuator','Pad;Cushion'=>'Pad;Cushion','Closer'=>'Closer','Handle Sub-Assy'=>'Handle Sub-Assy'],
            null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Currency',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::select('currency',$currency,null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Amount',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::number('amount',null,['class'=>'form-control','step'=>"0.01"])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Invoice',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::text('invoice',null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Invoice Date',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('invoice_date',$row->invoice_date,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Supplier',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-8">
            {{Form::select('supplier',$supplier,null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Origin',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::select('origin',$origin,null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'BL',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::text('bl',null,['class'=>'form-control'])}}
            </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">            
            {{Form::label(null, 'Ship By',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::select('ship_by',['SEA'=>'SEA','AIR'=>'AIR'],null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Container',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::text('cont',null,['class'=>'form-control'])}}
            </div>
            </div>                   
            <div class="form-group">            
            {{Form::label(null, 'Forwader',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-6">
            {{Form::select('forwader',$forwader,null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'ETD',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('etd',$row->etd,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'ETA',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('eta',$row->eta,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Pay PIB',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('pay_pib',$row->pay_pib,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'CC',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('cc',$row->cc,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Plan AIIA',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('aiia_plan',$row->aiia_plan,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'ATA AIIA',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('aiia',$row->aiia,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'GW',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::text('gw',null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Jumlah Satuan',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::text('jml_kms',null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Satuan',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::text('sat_kms',null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Dept',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::select('dept',$dept,null,['class'=>'form-control'])}}
            </div>
            </div>
            </div>        
        </font>
            <div class="form-group">            
            {{Form::label(null, '',['class'=>'col-sm-8 control-label'])}}
            <button class="btn btn-success" id="delete">
                    <i class="fa fa-pencil"></i>
                    Update
            </button>
            </div>       
    </div>
    {!! Form::close() !!}
</div>
</div>
</div>
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"><big><big><big><font face="calibri">EDIT SHIPMENT</font></big></big></big>
                    </div>
                <div class="panel-body">
                  <font face="calibri">
        {!! Form::model($row,['action' => ['ShipmentController@update2',$row->id],'method' => 'put','class'=>'form-horizontal', 'id'=>'myform']) !!}
            <div class="col-md-6">
            <div class="form-group">            
            {{Form::label(null, 'rcv_pre_alert',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('rcv_pre_alert',$row->rcv_pre_alert,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'draft_pib',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('draft_pib',$row->draft_pib,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'check_pib',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('check_pib',$row->check_pib,['class'=>'form-control'])}}
            </div>
            </div>            
            <div class="form-group">            
            {{Form::label(null, 'create_sk',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('create_sk',$row->create_sk,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'rcv_doc_ori',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('rcv_doc_ori',$row->rcv_doc_ori,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'send_sk_doc_ori',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('send_sk_doc_ori',$row->send_sk_doc_ori,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'ppjk_rcv_sk_doc_ori',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('ppjk_rcv_sk_doc_ori',$row->ppjk_rcv_sk_doc_ori,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'proses_pay_id',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('proses_pay_id',$row->proses_pay_id,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'pay_id',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('pay_id',$row->pay_id,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'pick_do',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-4">
            {{Form::date('pick_do',$row->pick_do,['class'=>'form-control'])}}
            </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">            
            {{Form::label(null, 'sppb',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-6">
            {{Form::date('sppb',$row->sppb,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'deliv_aiia',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-6">
            {{Form::date('deliv_aiia',$row->deliv_aiia,['class'=>'form-control'])}}
            </div>
            </div>                   
            <div class="form-group">            
            {{Form::label(null, 'remark',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-6">
            {{Form::text('remark',$row->remark,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'po',['class'=>'col-sm-3 control-label'])}}
            <div class="col-xs-6">
            {{Form::text('po',$row->po,['class'=>'form-control'])}}
            </div>
            </div>
            </div>
            </div>        
        </font>
            <div class="form-group">            
            {{Form::label(null, '',['class'=>'col-sm-8 control-label'])}}
            <button class="btn btn-success" id="delete">
                    <i class="fa fa-pencil"></i>
                    Update
            </button>
            </div>       
    </div>
    {!! Form::close() !!}
</div>
</div>
</div>
</div>
@endsection
