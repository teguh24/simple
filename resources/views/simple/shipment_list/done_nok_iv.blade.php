@extends('layouts.app')

@section('content')
<body background={{asset("/img/bg.jpg")}}>
<div class="container-full">
    
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
            <!--<body onload="notifyMe('SIMPLE', 'AKU PRIMA', 'http://localhost')"> -->
            <div id="successMessage" class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                <li><a href={{asset("/done/ok")}}><font face="calibri" color="black">Shipment Invoice </font> <span class="label label-default">{{$count_ok_iv}}</span></a></li>
                <li class="active"><a href={{asset("/done/not")}}><font face="calibri" color="black"><big><big><big>Outstanding Invoice Shipment </font></big></big></big> <span class="label label-danger">{{$count_nok_iv}}</span></a></li>
                </ul>
                <div class="panel-body">
                    <table id="done_iv_no" class="table table-bordered table-condensed dt-responsive" width="100%">
        <thead>
            <tr class="info">
                <th><small>Shipment</small></th>
                <th><small>Invoice</small></th>
                <th><small>Supplier</small></th>
                <th><small>Origin</small></th>
                <th><small>AWB/BL</small></th>
                <th><small>Forwader</small></th>
                <th><small>Ship By</small></th>
                <th><small>Container</small></th>
                <th><small>ETD</small></th>
                <th><small>ETA</small></th>
                <th><small>PIB</small></th>
                <th><small>CC</small></th>
                <th><small>ATA AIIA</small></th>
                <th></th>                                  
            </tr>
            </thead>
            @foreach($row as $data)                
                <tr class="danger">
                <td><small>{{$data->shipment}}</small></td>
                <td><small>{{$data->invoice}}</small></td>
                <td><small>{{$data->suplier}}</small></td>
                <td><small>{{$data->origin}}</small></td>
                <td><small>{{$data->bl}}</small></td>
                <td><small>{{$data->namappjk}}</small></td>
                <td><small>{{$data->ship_by}}</small></td>
                <td><small>{{$data->cont}}</small></td>
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
                <td><small>{{$data->aiia}}</small></td>
                <td>
                    <a class="btn btn-success btn-xs" href="/simple/create/iv/{{$data->invoice}}" ><font face="calibri">INVOICE</font></a>                    
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
