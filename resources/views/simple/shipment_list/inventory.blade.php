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
                <li class="active"><a class=""><big><big><big>Inventory Import</big></big></big> <span class="label label-warning">{{$count}}</span></a></li>
                </ul>
                <div class="panel-body">
                    <table id="import" class="table table-bordered table-condensed dt-responsive  width=100%">
                <thead> 
                <tr class="info">
                <th><small>Invoice</small></th>
                <th><small>BL</small></th>
                <th><small>Invoice_File</small></th>
                <th><small>Packing_List_File</small></th>
                <th><small>BL/AWB_File</small></th>
                <th><small>MBL/MAWB_File</small></th>
                <th><small>COO_File</small></th>
                <th><small>Insurance_File</small></th>
                <th><small>BPN & Billing</small></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($row as $rows)
            <tr class="info">              
                <td>{{$rows->invoice}}</td>
                <td>{{$rows->bl}}</td>
                @if($rows->invoice_file===null)
                <td><a href="upload/{{$rows->id}}">Invoice Belum Di Upload</a></td>
                @else
                <td><a target="_blank" href="{{asset('public//storage/'.$rows->invoice.'/invoice.pdf')}}">Invoice</a></td>
                @endif
                @if($rows->packing_list===null)
                <td><a target="_blank" href="upload/{{$rows->id}}">Packing List Belum Di Upload</a></td>
                @else
                <td><a target="_blank" href="{{asset('public//storage/'.$rows->invoice.'/packing_list.pdf')}}">Packing List</a></td>
                @endif
                @if($rows->bl_file===null)
                <td><a target="_blank" href="upload/{{$rows->id}}">BL/AWB Belum Di Upload</a></td>
                @else
                <td><a target="_blank" href="{{asset('public//storage/'.$rows->invoice.'/bl.pdf')}}">BL/AWB</a></td>
                @endif
                @if($rows->mbl===null)
                <td><a target="_blank" href="upload/{{$rows->id}}">MBL/MAWB Belum Di Upload</a></td>
                @else
                <td><a target="_blank" href="{{asset('public//storage/'.$rows->invoice.'/mbl.pdf')}}">MBL/MAWB</a></td>
                @endif
                @if($rows->insurance===null)
                <td><a target="_blank" href="upload/{{$rows->id}}">Insurance Belum Di Upload</a></td>
                @else
                <td><a target="_blank" href="{{asset('public//storage/'.$rows->invoice.'/insurance.pdf')}}">Insurance</a></td>
                @endif
                @if($rows->coo===null)
                <td><a target="_blank" href="upload/{{$rows->id}}">COO Belum Di Upload</a></td>
                @else
                <td><a target="_blank" href="{{asset('public//storage/'.$rows->invoice.'/coo.pdf')}}">COO</a></td>
                @endif                
                @if($rows->bpn_billing===null)
                <td><a target="_blank" href="upload/{{$rows->id}}">BPN & Billing Belum Di Upload</a></td>
                @else
                <td><a target="_blank" href="{{asset('public//storage/'.$rows->invoice.'/bpn_billing.pdf')}}">BPN & Billing</a></td>
                @endif
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
