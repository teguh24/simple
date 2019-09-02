@extends('layouts.app')
@section('content')
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Upload Actual Qty</h3>                  
      </div>
      <div class="modal-body">
        {!! Form::open(['action' => 'ShipmentController@store','class'=>'form-horizontal']) !!}
            <div class="col-md-12">            
            <div class="form-group">            
            {{Form::label(null, 'Actual Qty',['class'=>'col-sm-2 control-label'])}}
            <div class="col-xs-5">
            {{Form::file('qty',['class'=>'form-control'])}}
            </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Modal -->
<div class="container-full">
    <div class="row">                        
        <div class="col-md-12">
            <div class="nav-tabs-custom">                
                <div class="panel-body"> 
                <a data-toggle="modal" class="btn btn-primary" data-target="#myModal" href="#">
                    UPLOAD
                    </a><br><br>
                    <div class="col-md-6">
                    <div id="sea" style="min-width: 310px; max-width: 100%; height: 400px; margin: 0 auto"></div>
                    </div>
                    <div class="col-md-6">
                    <div id="air" style="min-width: 310px; max-width: 100%; height: 400px; margin: 0 auto"></div>
                    </div>
                    <div class="col-md-6">
                    <div id="all_sea" style="min-width: 310px; max-width: 100%; height: 400px; margin: 0 auto"></div>
                    </div>
                    <div class="col-md-6">
                    <div id="all_air" style="min-width: 310px; max-width: 100%; height: 400px; margin: 0 auto"></div>
                    </div>
                <style type="text/css">
                  th,td{
                    text-align: center;
                  }
                  .table > thead > tr > th {
                       vertical-align: middle;
                  }
                </style>
                <table id="quota" class="table table-hover table-bordered table-condensed dt-responsive">
                <thead>    
                <tr bgcolor="#5bc0de">                
                <th width='2%' rowspan='2'>No</th>
                <th width='12%' rowspan='2'>Pelabuhan</th>
                <th width='12%' rowspan='2'>HS Code</th>
                <th width='12%' rowspan='2'>Quota</th>                
                <th width='12%' colspan='2'>Pemakaian Quota</th>
                <th width='12%' colspan='2'>Sisa Quota</th>                
                <th width='12%' colspan='2'>Percentage Pemakaian</th>
                <th width='12%' colspan='2'>Sisa Percentage Quota</th>
                </tr>
                <tr>
                <th bgcolor="#e6b3ff">Current Condition</th>
                <th bgcolor='#80bfff'>Outlook 3 Bulan</th>
                <th bgcolor="#e6b3ff">Current Condition</th>
                <th bgcolor='#80bfff'>Outlook 3 Bulan</th>
                <th bgcolor="#e6b3ff">Current Condition</th>
                <th bgcolor='#80bfff'>Outlook 3 Bulan</th>
                <th bgcolor="#e6b3ff">Current Condition</th>
                <th bgcolor='#80bfff'>Outlook 3 Bulan</th>
                </tr>
            </thead>    
             <tbody>
                @foreach($row as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->pelabuhan}}</td>
                    <td>{{$data->hs}}</td>
                    <td>{{number_format($data->quota)}}</td>                    
                    <td bgcolor="#e6b3ff">{{number_format($data->pemakaian)}}</td>
                    <td bgcolor='#80bfff'>{{number_format($data->pemakaian*3)}}</td>
                    <td bgcolor="#e6b3ff">{{number_format($data->quota - $data->pemakaian)}}</td>
                    <td bgcolor="#80bfff">{{number_format($data->quota - ($data->pemakaian*3))}}</td>                    
                    <td bgcolor="#e6b3ff">{{round($data->pemakaian/$data->quota*100)}}%</td>
                    <td bgcolor="#80bfff">{{round($data->pemakaian*3/$data->quota*100)}}%</td>
                    <td bgcolor="#e6b3ff">{{round(($data->quota - $data->pemakaian)/$data->quota*100)}}%</td>
                    <td bgcolor="#80bfff">{{round(($data->quota - ($data->pemakaian*3))/$data->quota*100)}}%</td>
                </tr>
                @endforeach
             </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">

Highcharts.chart('all_sea', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Realisasi Quota SPI Besi Baja SEA'
  },
  subtitle: {
    text: 'Outlok 3 Bulan'
  },
  xAxis: {
    categories: ["<b>73181410</b>", "<b>73181610</b>", "<b>73181990</b>", "<b>73201510</b>", "<b>73182910</b>", "<b>73182200</b>" ,
     "<b>73182011</b>"],
    title: {
      text: null
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Percentage (%)',
      align: 'high'
    },
    labels: {
      overflow: 'justify'
    }
  },
  tooltip: {
    valueSuffix: ' percentage'
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true
      }
    }
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: -40,
    y: 1,
    floating: true,
    borderWidth: 1,
    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
    shadow: true
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Quota',
    data: [100,100, 100, 100, 100,100,100]
  }, {
    name: 'Realisasi',
    data: [9, 24, 18, 9, 15,9,12],
    color:'#f44242'
  }]
});

Highcharts.chart('sea', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Realisasi Quota SPI Besi Baja SEA'
  },
  subtitle: {
    text: 'Bulan Februari 2019'
  },
  xAxis: {
    categories: ["<b>73181410</b>", "<b>73181610</b>", "<b>73181990</b>", "<b>73201510</b>", "<b>73182910</b>", "<b>73182200</b>" ,
     "<b>73182011</b>"],
    title: {
      text: null
    }
  },
  yAxis: {
        plotLines: [{

        color: '#f44242', // Red
        width: 2,
        value: 8,// Position, you'll have to translate this to the values on your x axis   
        label: {
                text: '8 %',
                align: 'right',
                x: -5,
                y:-5
            }     
    }],
    min: 0,
    title: {
      text: 'Percentage (%)',
      align: 'high'
    },
    labels: {
      overflow: 'justify'
    }
  },
  tooltip: {
    valueSuffix: ' percentage'
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true
      }
    }
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: -40,
    y: 1,
    floating: true,
    borderWidth: 1,
    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
    shadow: true
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Quota',
    data: [100,100, 100, 100, 100,100,100]
  }, {
    name: 'Realisasi',
    data: [3, 8, 6, 3, 5,3,4]
  }, {
    name: 'Target',
    color:'#f44242'
  }]
});

Highcharts.chart('air', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Realisasi Quota SPI Besi Baja AIR'
  },
  subtitle: {
    text: 'Bulan Februari 2019'
  },
  xAxis: {
    categories: ["73181410", "73181610", "73181990", "73201510", "73182910", "73182200" , "73182011"],
    title: {
      text: null
    }
  },
  yAxis: {
    plotLines: [{

        color: '#f44242', // Red
        width: 2,
        value: 8,// Position, you'll have to translate this to the values on your x axis   
        label: {
                text: '8 %',
                align: 'right',
                x: -5,
                y:-5
            }     
    }],
    min: 0,
    title: {
      text: 'Percentage (%)',
      align: 'high'
    },
    labels: {
      overflow: 'justify'
    }
  },
  tooltip: {
    valueSuffix: ' percentage'
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true
      }
    }
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: -40,
    y: 0,
    floating: true,
    borderWidth: 1,
    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
    shadow: true
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Quota',
    data: [100,100, 100, 100, 100,100,100]
  }, {
    name: 'Realisasi',
    data: [0, 0, 0, 0, 0,0,0]
  }, {
    name: 'Target',
    color:'#f44242'
  }]
});

Highcharts.chart('all_air', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Realisasi Quota SPI Besi Baja AIR'
  },
  subtitle: {
    text: ' Outlok 3 Bulan'
  },
  xAxis: {
    categories: ["73181410", "73181610", "73181990", "73201510", "73182910", "73182200" , "73182011"],
    title: {
      text: null
    }
  },
  yAxis: {

    min: 0,
    title: {
      text: 'Percentage (%)',
      align: 'high'
    },
    labels: {
      overflow: 'justify'
    }
  },
  tooltip: {
    valueSuffix: ' percentage'
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true
      }
    }
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: -40,
    y: 0,
    floating: true,
    borderWidth: 1,
    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
    shadow: true
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Quota',
    data: [100,100, 100, 100, 100,100,100]
  }, {
    name: 'Realisasi',
    data: [0, 0, 0, 0, 0,0,0],
    color:'#f44242'
  }]
});

</script>
@endsection
