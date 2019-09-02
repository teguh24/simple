@extends('layouts.app')
@section('content')
<!-- Modal -->


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Shipment</h3>                  
      </div>
      <div class="modal-body">
        {!! Form::open(['action' => 'ShipmentController@store','class'=>'form-horizontal']) !!}
            <div class="col-md-12">
            <div class="form-group">            
            {{Form::label(null, 'Shipment',['class'=>'col-sm-2 control-label'])}}
            <div class="col-sm-5">
            <select name="shipment" class="form-control">
                <option value="CKD">CKD</option>
                <option value="Seat Motor">Seat Motor</option>
                <option value="Ball Bearing">Ball Bearing</option>
                <option value="Shaft Oil Pump">Shaft Oil Pump</option>
                <option value="Rotor Water Pump">Rotor Water Pump</option>
                <option value="Plug Oil Pump">Plug Oil Pump</option>
                <option value="Antenna">Antenna</option>
                <option value="Gasket">Gasket</option>
                <option value="Housing Camshaft">Housing Camshaft</option>
                <option value="Case FR">Case FR</option>
                <option value="Lever">Lever</option>
                <option value="Actuator">Actuator</option>
                <option value="Pad;Cushion">Pad;Cushion</option>
                <option value="Closer">Closer</option>
                <option value="Handle Sub-Assy">Handle Sub-Assy</option>
            </select>
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Currency',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-3">
            {{Form::select('currency',$currency,null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Amount',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-7">
            {{Form::number('amount',null,['class'=>'form-control','step'=>"0.01"])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Invoice',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-7">
            {{Form::text('invoice',null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Suplier',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-7">
            {{Form::select('supplier',$supplier,null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Origin',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::select('origin',$origin,null,['class'=>'form-control'])}}
            </div>
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">            
            {{Form::label(null, 'Ship By',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::select('ship_by',['SEA'=>'SEA','AIR'=>'AIR'],null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'BL',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-7">
            {{Form::text('bl',null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Forwader',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-4">
            {{Form::select('forwader',$forwader,null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'ETD',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-5">
            {{Form::date('etd',\Carbon\Carbon::now(),['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'ETA',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-5">
            {{Form::date('eta',\Carbon\Carbon::now(),['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">            
            {{Form::label(null, 'Plan AIIA',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-5">
            {{Form::date('aiia_plan',\Carbon\Carbon::now(),['class'=>'form-control'])}}
            </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Modal -->
<div class="container-full">
    <div class="row">        
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                <li class="active"><a class=""><big><big><big><font face="calibri">Shipment Pending</font></big></big></big> <span class="label label-warning">{{$count}}</span></a></li>
                <li><a href="{{asset('home')}}"><big><font face="calibri">Shipment ATA AIIA</font></big> <span class="label label-success">{{$count_ok}}</span></a></li>                
                </ul>
                <div class="panel-body">   
                <a data-toggle="modal" class="btn btn-primary" data-target="#myModal" href="#">
                    CREATE
                    </a>
                    <br><br>                 
                    <table id="import" class="table table-hover table-bordered table-condensed dt-responsive">
                <thead> 
                <tr class="info">
                <th><small>Shipment</small></th>
                <th><small>Invoice</small></th>
                <th><small>Supplier</small></th>
                <th><small>Origin</small></th>
                <th><small>AWB/BL</small></th>
                <th><small>Forwader</small></th>
                <th><small>Ship By</small></th>
                <th><small>ETD</small></th>
                <th><small>ETA</small></th>
                <th><small>PIB</small></th>
                <th><small>CC</small></th>
                <th><small>ETA AIIA</small></th>
                <th></th>
            </tr>
            </thead>    
            @foreach($row as $data)
                @if($data->eta <= \Carbon\Carbon::now()&$data->aiia_plan <= \Carbon\Carbon::now())
                <tr class="danger">  
                @elseif($data->eta <= \Carbon\Carbon::now())
                <tr class="warning">
                @else
                <tr class="success">
                @endif
                <td><small>{{$data->shipment}}</small></td>
                <td><small>{{$data->invoice}}</small></td>
                <td><small>{{$data->suplier}}</small></td>
                <td><small>{{$data->origin}}</small></td>
                <td><small>{{$data->bl}}</small></td>
                <td><small>{{$data->namappjk}}</small></td>
                <td><small>{{$data->ship_by}}</small></td>
                <td><small>{{$data->etd}}</small></td>
                <td><small>{{$data->eta}}</small></td>
                <td><small>
                    @if($data->pay_pib==null || $data->pay_pib == 0000-00-00)
                    Belum
                    @else
                    {{$data->pay_pib}}
                    @endif
                </small></td>
                <td><small>
                    @if($data->cc==null || $data->cc == 0000-00-00)
                    Belum
                    @else
                    {{$data->cc}}
                    @endif
                </small></td>
                <td><small>{{$data->aiia_plan}}</small></td>
                <td style="vertical-align:middle">
                    <a href="{{$data->invoice}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-xs" aria-hidden="true"></i></a>
                    <a onclick="return confirm('are you sure?')" href="delete/{{$data->invoice}}" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-xs" aria-hidden="true"></i></a>
                    <a onclick="return confirm('are you sure?')" href="public/print/{{$data->invoice}}" class="btn btn-success btn-xs"><i class="fa fa-print fa-xs" aria-hidden="true"></i></a>
                    <a onclick="return confirm('are you sure?')" href="email/{{$data->invoice}}" class="btn btn-primary btn-xs"><i class="fa fa-at fa-xs" aria-hidden="true"></i></a>                                       
                </td>
                </tr>
                @endforeach     
            </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
