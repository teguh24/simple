@extends('layouts.app')

@section('content')
<body background="/img/bg.jpg"> 
<div class="container-fluit">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class="panel-body">
                    <div class="col-md-6">
                <div class="form">
                    
                    {!! Form::open(['method' => 'POST', 'action' => ['ivController@store',$row[0]->id], 'class' => 'form-horizontal']) !!}
                        <div class="col-md-12">
                        {!! Form::label('Invoice', 'Invoice') !!}
                        {!! Form::text('invoice', $row[0]->invoice, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('invoice') }}</small>
                        {!! Form::label(null, 'Invoice Forwader') !!}
                        {!! Form::text('invoice_fwd', null, ['class' => 'form-control', 'required' => 'required','autofocus']) !!}
                        <small class="text-danger">{{ $errors->first('invoice_fwd') }}</small>
                        {!! Form::label(null, 'Amount') !!}
                        {!! Form::number('amount_fwd', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('amount_fwd') }}</small>
                        {!! Form::label(null, 'Remarks') !!}
                        {!! Form::text('remarks', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('remarks') }}</small>
                        <br>                        
                        {!! Form::submit("Save", ['class' => 'btn btn-success']) !!}
                      </div>
                      
                    {!! Form::close() !!}
                    
        </div>
</div>
<div class="col-md-5">
 <table style="border-spacing: 2px;" id="iv_fwd" class="table table-condensed dt-responsive" width="100%">
            <thead>
                <tr class="info">
                <th><small>Invoice</small></th>
                <th><small>Invoice Forwader</small></th>
                <th><small>Amount</small></th>
                <th><small>Remarks</small></th>
                <th class="danger"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $rows)
            <tr class="success">
                <td>{{$rows->invoice}}</td>
                <td>{{$rows->invoice_fwd}}</td>
                <td>{{number_format($rows->amount_fwd)}}</td>
                <td>{{$rows->remarks}}</td>
                <td class="danger"><center>
                    <a href="/simple/public/iv/forwader/{{$rows->id}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil fa-xs" aria-hidden="true"></i></a>
                    <a onclick="return confirm('are you sure?')" href="/simple/public/del/iv/{{$rows->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-xs" aria-hidden="true"></i></a>
                    </center>
                </td>
            </tr>
            @endforeach
        </tbody>
            </table>
</div>
</div>
</div>
        </div>
</div>
</div>
@endsection
