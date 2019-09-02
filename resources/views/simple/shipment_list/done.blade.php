@extends('layouts.app')

@section('content')
<body background={{asset("/img/bg.jpg")}}>   
<div class="container-full">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                <li><a href ={{asset("/home")}}><font color="black" face="calibri">Outstanding Shipment </font><span class="label label-warning">{{$count_out}}</span></a></li>
                <li class="active"><a class=""><big><big><big><font face="calibri" >Shipment OK </font></big></big></big> <span class="label label-success">{{$count}}</span></a></li>
                </ul>
                <div class ="panel-body">
            <table id="done" class="table table-bordered table-condensed dt-responsive" width="100%">
        <thead>
            <tr class="info">
                
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
                <th><small>Forwader</small></th>
                <th><small>GW(Kgs)</small></th>
                <th><small>Jumlah Kemasan</small></th>
                <th><small>Jenis Kemasan</small></th>
                <th><small>No. SK</small></th>
                <th><small>Invoice_File</small></th>
                <th><small>Packing_List_File</small></th>
                <th><small>BL/AWB_File</small></th>
                <th><small>MBL/MAWB_File</small></th>
                <th><small>COO_File</small></th>
                <th><small>Insurance_File</small></th>
                <th><small>PIB_file</small></th>
                <th><small>BPN & Billing</small></th>    
                <th class="danger"></th>
                
            </tr>
        </thead>
        <tfoot>
            <tr class="info">
                
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
                <th><small>Forwader</small></th>
                <th><small>GW(Kgs)</small></th>
                <th><small>Jumlah Kemasan</small></th>
                <th><small>Jenis Kemasan</small></th>
                <th><small>No. SK</small></th>
                <th><small>Invoice_File</small></th>
                <th><small>Packing_List_File</small></th>
                <th><small>BL/AWB_File</small></th>
                <th><small>MBL/MAWB_File</small></th>
                <th><small>COO_File</small></th>
                <th><small>Insurance_File</small></th>
                <th><small>PIB_file</small></th>
                <th><small>BPN & Billing</small></th>    
                <th class="danger"></th>                
            </tr>
        </tfoot>
            </table>
                </div>
        </div>
        </div>
    </div>
</div>
@endsection
