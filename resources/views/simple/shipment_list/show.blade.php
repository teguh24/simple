@extends('layouts.app')

@section('content')
<body background="/img/bg.jpg">   
<div class="container-fluit">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class ="panel-body">
            <table style="border-spacing: 2px;" class="table table-bordered table-condensed" width="100%">
        <thead>
            <tr class="info">
                <div class="col-md-12">
                <th><small>Nomor SK</small></th>
                <th><small>Shipment</small></th>
                <th><small>Currency</small></th>
                <th><small>Amount</small></th>
                <th><small>Invoice</small></th>
                <th><small>Suplier</small></th>
                <th><small>Origin</small></th>
                <th><small>Ship By</small></th>
                <th><small>BL</small></th>
                <th><small>ETD</small></th>
                <th><small>ETA</small></th>
                <th><small>Plan ETA AIIA</small></th>
                <th><small>PIB Payment</small></th>
                <th><small>Custom Clearance</small></th>
                <th><small>ETA AIIA</small></th>
            </thead>
                <tr class="info">
                <td>{{$rows[0]->id}}</td>
                <td>{{$rows[0]->shipment}}</td>
                <td>{{$rows[0]->currency}}</td>
                <td>{{number_format($rows[0]->amount,2)}}</td>
                <td>{{$rows[0]->invoice}}</td>
                <td>{{$rows[0]->supplier}}</td>
                <td>{{$rows[0]->origin}}</td>
                <td>{{$rows[0]->ship_by}}</td>
                <td>{{$rows[0]->bl}}</td>
                <td>{{date('d/M/Y', strtotime($rows[0]->etd))}}</td>
                <td>{{date('d/M/Y', strtotime($rows[0]->eta))}}</td>
                <td>{{date('d/M/Y', strtotime($rows[0]->aiia_plan))}}</td>
                <td>{{date('d/M/Y', strtotime($rows[0]->pay_pib))}}</td>
                <td>{{date('d/M/Y', strtotime($rows[0]->cc))}}</td>
                <td>{{date('d/M/Y', strtotime($rows[0]->aiia))}}</td>
                </tr>
                </div>
                <div clas="col-md-12">
                </table>
                
            
            <div class="col-md-6 col-md-offset-3">
                <center><label>Total Invoice Rp {{number_format($invoice_total)}}</label></center>
                <table style="border-spacing: 2px;" class="table table-bordered table-condensed" width="50%">
                <tr class="info">
                <th><small>Invoice Forwader</small></th>
                <th><small>Amount</small></th>
                <th><small>Remarks</small></th>
            </tr>
            @foreach($row as $rows[0])
                <tr class="info">
                <td>{{$rows[0]->invoice_fwd}}</td>
                <td>Rp {{number_format($rows[0]->amount_fwd)}}</td>
                <td>{{$rows[0]->remarks}}</td>
                </tr>
            @endforeach
            </table>
                </div>
                </div>
                </div>
        </div>
        </div>
    </div>
</div>
@endsection
