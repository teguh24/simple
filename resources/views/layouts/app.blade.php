<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
window.Laravel = <?php echo json_encode([
'csrfToken' => csrf_token(),
]); ?>
</script>
<title>{{ config('app.name', 'SIMPLE') }}</title>
<!-- Styles -->
<link rel="stylesheet" type="text/css" href="{{asset('public/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/responsive.bootstrap.min.css')}}"> 
<link rel="stylesheet" type="text/css" href="{{asset('public//css/AdminLTE.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public//css/navigasi.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/css/sweetalert.css')}}">
</head>
<body>
    <style type="text/css">
        body {
           background-image: url("img/bg_.jpeg");
           background-color: #cccccc;
        }
    </style>
<!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">SIMPLE</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
&nbsp;
@if (Auth::guest())
@else
@if(Auth::user()->name === 'admin')
<li><a href="{{asset('portal')}}"><b><font face="calibri"><i class="fa fa-list-ol" aria-hidden="true"></i> SHIPMENT LIST</font></b></a></li>
<li><a href="{{asset('inventory')}}"><b><font face="calibri"><i class="fa fa-book" aria-hidden="true"></i>  Inventory Document Import</font></b></a></li>
<li><a href="{{asset('done/not')}}"><b><font face="calibri"><i class="fa fa-money" aria-hidden="true"></i>  Invoicing Import</font></b></a></li>
<li><a href="{{asset('report')}}"><b><font face="calibri"><i class="fa fa-file" aria-hidden="true"></i>  Report</font></b></a></li>
<li><a href="{{asset('quota')}}"><b><font face="calibri"><i class="fa fa-file" aria-hidden="true"></i>  Quota</font></b></a></li>
@endif
@endif  
</ul>

<!-- Right Side Of Navbar -->
<ul class="nav navbar-nav navbar-right">

<!-- Authentication Links -->
@if (Auth::guest())                        
@else 

<li><a aria-expanded="false">Welcome {{ Auth::user()->name }}</a>
</li>
<li>
<a href="{{ url('/logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
<button class="btn btn-sm bg-maroon"><i class="fa fa-power-off" aria-hidden="true"></i></button>
</a>
<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>
</li>
@endif
</ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
@yield('content')
<!-- Scripts -->
<script type="text/javascript" src="{{asset('public/js/app.js')}}"></script>

<script type="text/javascript" src="{{asset('public/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/buttons.flash.min.js')}}"></script>
<script type="text/javascript" scr="{{asset('public/js/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/responsive.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/Chart.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<!-- Include this after the sweet alert js file -->
@include('sweet::alert')
<!-- Data Table Script -->
<script type="text/javascript">
$(document).ready(function() {
$('#import').DataTable({
responsive: {
details: {
display: $.fn.dataTable.Responsive.display.modal( {
header: function ( row ) {
var data = row.data();
return 'Details for '+data[0];
}
}),
renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
tableClass: 'table'
})
}
},
"lengthMenu": [[ 10, 50, 75, 100 , -1],[10,50,75,100, "All"]],
"order": [[ 8, "asc" ]],
});


var t =$('#quota').DataTable({
responsive: {
details: {
display: $.fn.dataTable.Responsive.display.modal( {
header: function ( row ) {
var data = row.data();
return 'Details for '+data[0];
}
}),
renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
tableClass: 'table'
})
}
},
"lengthMenu": [[ -1, 50, 75, 100 , -1],["All",50,75,100, "All"]],
"order": [[ 6, "desc" ]],
"columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ]
});
t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

$('#kasir').DataTable({
responsive: {
details: {
display: $.fn.dataTable.Responsive.display.modal( {
header: function ( row ) {
var data = row.data();
return 'Details for '+data[0];
}
}),
renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
tableClass: 'table'
})
}
},
"lengthMenu": [ 100, 25, 50, 75 ]
});    

$('#import2').DataTable({
responsive: {
details: {
display: $.fn.dataTable.Responsive.display.modal( {
header: function ( row ) {
var data = row.data();
return 'Details for '+data[0];
}
} ),
renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
tableClass: 'table'
} )
}
},
dom: 'lBfrtip',
"lengthMenu": [ 100, 25, 50, 75 ],
"order": [[ 6, "asc" ]],
buttons: [
'csvFlash',
'excelFlash',
'colvis'
]
});

$('#iv_fwd').DataTable({
"paging":   false,
"ordering": true,
"searching":false,
"info":     false
});

$('#done').DataTable({
responsive: {
details: {
display: $.fn.dataTable.Responsive.display.modal( {
header: function ( row ) {
var data = row.data();
return 'Details for '+data[0];
}
}),
renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
tableClass: 'table'
})
}
},
dom: 'lBfrtip',
"lengthMenu": [ 100, 25, 50, 75 ],
"order": [[ 13, "desc" ]],
buttons: [
'csvFlash',
'excelFlash',
'colvis'
],
processing: true,
serverSide: true,
ajax: '{{asset("data")}}'
});

$('#done_iv').DataTable({
responsive: {
details: {
display: $.fn.dataTable.Responsive.display.modal( {
header: function ( row ) {
var data = row.data();
return 'Details for '+data[0];
}
}),
renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
tableClass: 'table'
})
}
},
"lengthMenu": [ 10, 25, 50, 100 ],
"order": [[ 11, "desc" ]]
});

$('#done_iv_no').DataTable({
responsive: {
details: {
display: $.fn.dataTable.Responsive.display.modal( {
header: function ( row ) {
var data = row.data();
return 'Details for '+data[0];
}
} ),
renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
tableClass: 'table'
} )
}
},
"lengthMenu": [ 100, 25, 50, 75 ],
"order": [[ 11, "desc" ]],
"dom": 'lBfrtip',
"buttons": [
'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
],
});
});
</script>
<script type="text/javascript">
$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});
</script>
<style>
body{
background-image: url('http://solid/img/school.png');
background-repeat: repeat-x repeat-y;
}
</style>

</body>
</html>