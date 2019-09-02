@extends('layouts.app')
@section('content')
<div class="container-full">
    <div class="row">        
        <div class="col-md-3 col-md-offset-1">
            <h1><center>Report Intransit</center></h1>
            <div class="nav-tabs-custom">                
                <div class="panel-body">                                    
                  <form action="{{asset('intransit')}}">
                    <label>Bulan Intransit</label>
                    <select name="bulan" class="form-control">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <label>Tahun Intransit</label>
                    <select name="tahun" class="form-control">
                        <option value="2018">2018</option>
                        <option value="2016">2017</option>
                        <option value="2017">2016</option>                        
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        </select>
                    <br>
                    <input type="submit" value="Lihat" class="btn btn-md btn-primary">
                    </form> 
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <h1><center>Report ETD</center></h1>
            <div class="nav-tabs-custom">                
                <div class="panel-body">                                    
                  <form action="{{asset('report_etd')}}">
                    <label>Bulan ETD</label>
                    <select name="bulan" class="form-control">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <label>Tahun Intransit</label>
                    <select name="tahun" class="form-control">
                        <option value="2018">2018</option>
                        <option value="2016">2017</option>
                        <option value="2017">2016</option>                        
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        </select>
                    <br>
                    <input type="submit" value="Lihat" class="btn btn-md btn-primary">
                    </form> 
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <h1><center>Report ATA AIIA</center></h1>
            <div class="nav-tabs-custom">                
                <div class="panel-body">                                    
                  <form action="{{asset('report_ata')}}">
                    <label>Bulan ATA AIIA</label>
                    <select name="bulan" class="form-control">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <label>Tahun Intransit</label>
                    <select name="tahun" class="form-control">
                        <option value="2018">2018</option>
                        <option value="2016">2017</option>
                        <option value="2017">2016</option>                        
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        </select>
                    <br>
                    <input type="submit" value="Lihat" class="btn btn-md btn-primary">
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
