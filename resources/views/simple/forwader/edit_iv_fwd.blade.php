@extends('layouts.app')

@section('content')
<style type="text/css">
.row{
      margin: auto;
}
</style>
<body background="/img/bg.jpg"> 
<div class="container-fluit">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class="panel-body">
                    <div class="col-md-6">
                <div class="form">
                    <font face="calibri">
                    {!! Form::model($row,['method' => 'PUT', 'action' => ['ivController@update',$row->id], 'class' => 'form-horizontal']) !!}
                        <div class="col-md-12">
                        {!! Form::label('Invoice', 'Invoice') !!}
                        {!! Form::text('invoice', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('invoice') }}</small>
                        {!! Form::label(null, 'Invoice Forwader') !!}
                        {!! Form::text('invoice_fwd', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('invoice_fwd') }}</small>
                        {!! Form::label(null, 'Amount') !!}
                        {!! Form::number('amount_fwd', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('amount_fwd') }}</small>
                        {!! Form::label(null, 'Remarks') !!}
                        {!! Form::text('remarks', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('remarks') }}</small>
                        <br>                        
                        {!! Form::submit("Update", ['class' => 'btn btn-success']) !!}
                      </div>
                    {!! Form::close() !!}

                    </font>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
@endsection
