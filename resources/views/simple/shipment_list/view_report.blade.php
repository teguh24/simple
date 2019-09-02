@extends('layouts.app')
@section('content')
<div class="container-full">
    <div class="row">        
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class="panel-body">                    
                    <table id="import" class="table table-bordered table-condensed dt-responsive">
                <thead> 
                <tr class="info">
                <th><small>Shipment</small></th>
                <th><small>Invoice</small></th>
                <th><small>Currency</small></th>
                <th><small>Amount</small></th>
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
                <th><small>PO</small></th>                
            </tr>
            </thead>
            <tbody>
                @foreach($row as $data)
                <tr>
                <td><small>{{$data->shipment}}</small></td>
                <td><small>{{$data->invoice}}</small></td>
                <td><small>{{$data->currency}}</small></td>
                <td><small>{{number_format($data->amount)}}</small></td>
                <td><small>{{$data->suplier}}</small></td>
                <td><small>{{$data->origin}}</small></td>
                <td><small>@if($data->bl==null)
                    Belum
                    @else
                    {{$data->bl}}
                    @endif</small></td>
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
                <td><small>@if($data->aiia==null || $data->aiia == 0000-00-00)
                    Belum
                    @else
                    {{$data->aiia}}
                    @endif</small></td>
                <td><small>{{$data->po}}</small></td>
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
