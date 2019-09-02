@extends('layouts.app')

@section('content')
<body background="/img/bg.jpg">
<div class="container-fluid">
<div class="row">
<div class="col-md-10">
</div>
</div> 
<div class="container-fluit">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <form action="{{asset('upload_data/'.$row->id)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field()}}
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12">
            <div class="jumbotron">
                <h1>SIMPLE DOCUMENT INVENTORY</h1>
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-12">
            <h4>Invoice</h4>
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input type="file" value="{{$row->invoice_file}}"name="invoice_file" style="display: none;" multiple>
                    </span>
                </label>
                <input value="{{$row->invoice_file}}" type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <h4>Packing List</h4>
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input value="{{$row->packing_list}}" type="file" name="packing_list" style="display: none;" multiple>
                    </span>
                </label>
                <input value="{{$row->packing_list}}" type="text" class="form-control" readonly>
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-12">
            <h4>BL/AWB</h4>
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input value="{{$row->bl_file}}" type="file" name="bl_file" style="display: none;" multiple>
                    </span>
                </label>
                <input value="{{$row->bl_file}}" type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <h4>MBL/MAWB</h4>
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input value="{{$row->mbl}}" type="file" name="mbl" style="display: none;" multiple>
                    </span>
                </label>
                <input value="{{$row->mbl}}" type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <h4>Insurance</h4>
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input value="{{$row->insurance}}" type="file" name="insurance" style="display: none;" multiple>
                    </span>
                </label>
                <input value="{{$row->insurance}}" type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-12 col-md-offset-6">
            <h4>COO</h4>
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input value="{{$row->coo}}" type="file" name="coo" style="display: none;" multiple>
                    </span>
                </label>
                <input value="{{$row->coo}}" type="text" class="form-control" readonly>
            </div>
        </div>        
        <div class="col-lg-6 col-sm-6 col-12 col-md-offset-6">
            <h4>BPN & Billing</h4>
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input value="{{$row->bpn_billing}}" type="file" name="bpn_billing" style="display: none;" multiple>
                    </span>
                </label>
                <input value="{{$row->bpn_billing}}" type="text" class="form-control" readonly>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-12 col-md-offset-6">
            <br>
            <div class="input-group">
                <input type="submit" class="form-control btn btn-success">
            </div>
            <br>
        </div>
        </form>
    </div>
</div>
</div>                
</div>                
</div>
</div>
@endsection
