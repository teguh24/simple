@extends('layouts.app')
@section('content')
<div class="container-full">
    <div class="row">        
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">                                
                <li><a href="{{asset('portal')}}"><big><font face="calibri">Shipment Pending</font></big> <span class="label label-warning">{{$count}}</span></a></li>
                <li class="active"><a class=""><big><big><big><font face="calibri">Shipment OK</font></big></big></big> <span class="label label-success">{{$count_ok}}</span></a></li>
                </ul>
                <div class="panel-body">                    
                    <table id="import" class="table table-bordered table-condensed dt-responsive">
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
                <th><small>Pay PIB</small></th>
                <th><small>CC</small></th>
                <th><small>ETA AIIA</small></th>
                <th><small>ATA AIIA</small></th>                
            </tr>
            </thead>
            <tbody>
                @foreach($row as $data)
                <tr>
                <td><small>{{$data->shipment}}</small></td>
                <td><small>{{$data->invoice}}</small></td>
                <td><small>{{$data->suplier}}</small></td>
                <td><small>{{$data->origin}}</small></td>
                <td><small>{{$data->bl}}</small></td>
                <td><small>{{$data->namappjk}}</small></td>
                <td><small>{{$data->ship_by}}</small></td>
                <td><small>{{$data->etd}}</small></td>
                <td><small>{{$data->eta}}</small></td>
                <td><small>{{$data->pay_pib}}</small></td>
                <td><small>{{$data->cc}}</small></td>
                <td><small>{{$data->aiia_plan}}</small></td>
                <td><small>{{$data->aiia}}</small></td>
                
                </tr>
                @endforeach    
            </tbody>        
            </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
