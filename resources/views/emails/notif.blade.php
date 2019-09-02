<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
  <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->
  <title>Daily Quota PI Besi Baja Report</title>
  
  <style type="text/css">
body {
  margin: 0;
  padding: 0;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}

table {
  border-spacing: 0;
}

table td {
  border-collapse: collapse;
}

hr {
  margin: 15px 0px;
  border: 1px solid #e1e1e1;
}

.btn-arka {
  margin-top: 10px;
  display: inline-block;
  padding: 5px 10px;
  text-decoration: none;
  background-color: #1e8bc3;
  color: #fff;
}

.head-custom {
  padding: 15px 0px;
}

.ExternalClass {
  width: 100%;
}

.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
  line-height: 100%;
}

.ReadMsgBody {
  width: 100%;
  background-color: #ebebeb;
}

.table-custom {
  border-collapse: collapse;
  width: 1000px !important;
  color: #333;
  font-size: 12px;
}
table.table-bordered{
    border:1px solid blue;
    margin-top:20px;
  }
table.table-bordered > thead > tr > th{
    border:1px solid #b3b3b3;
}
table.table-bordered > tbody > tr > td{
    border:1px solid #b3b3b3;
}
@font-face {
    font-family: colonnaMT;
    src: url(http://localhost/simple/public/ColonnaMT.ttf);
}
.table-custom td,  .table-custom th {
  border: 1px solid #e1e1e1;
  padding: 10px;
}

.text-center {
  text-align: center;
}

.text-right {
  text-align: right;
}

table {
  mso-table-lspace: 0pt;
  mso-table-rspace: 0pt;
}

img {
  -ms-interpolation-mode: bicubic;
}

.yshortcuts a {
  border-bottom: none !important;
}

@media  screen and (max-width: 599px) {
  .force-row,
  .container {
    width: 100% !important;
    max-width: 100% !important;
  }
}
@media  screen and (max-width: 400px) {
  .container-padding {
    padding-left: 12px !important;
    padding-right: 12px !important;
  }
}
.ios-footer a {
  color: #aaaaaa !important;
  text-decoration: underline;
}
</style>
</head>

<body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<!-- 100% background wrapper (grey background) -->
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
  <tr>
    <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;">

      <br>

      <!-- 600px container (white background) -->
      <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" style="width:600px;max-width:600px">
        <tr>
          <td class="container-padding content" align="left" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff">
            <br>      
          <div class="title" style="font-family:colonnaMT;font-size:25px;font-weight:600;color:#374550;">
            <font color='black'>Quota PI Besi Baja Update {{date("F j, Y, g:i a")}} </font>&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="http://aisinbisa/img/aiia.png" width='150' hright='100'></div>        
          <hr size='5px' color='black'>      
          <style type="text/css">
                  th,td{
                    text-align: center;
                  }
                  .table > thead > tr > th {
                       vertical-align: middle;
                  }

                </style>   
            <table BORDERCOLOR='black' id="quota" class="table-custom">
                <thead>    
                <tr bgcolor="#5bc0de">                
                <th>No</th>
                <th>Pelabuhan</th>
                <th>HS Code</th>
                <th>Quota</th>                
                <th>Pemakaian Quota</th>
                <th>Sisa Quota</th>                
                <th>Percentage Pemakaian</th>
                <th>Sisa Percentage Quota</th>                
                </tr>
            </thead>    
             <tbody>
                @foreach($row as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->pelabuhan}}</td>
                    <td>{{$data->hs}}</td>
                    <td>{{number_format($data->quota)}}</td>                    
                    <td>{{number_format($data->pemakaian)}}</td>
                    <td>{{number_format($data->quota - $data->pemakaian)}}</td>
                    <td>{{round($data->pemakaian/$data->quota*100)}}%</td>
                    <td>{{round(($data->quota - $data->pemakaian)/$data->quota*100)}}%</td>                    
                </tr>
                @endforeach
             </tbody>
            </table>
              <p align="left"><font color="#0044cc">Improved By EXIM Section</font></p>
              <font color="#0044cc"><p align="justify"><i><center><b><u>Disclaimer</u></b></center></font><center> 
<font size="2px"  color="#0044cc">
    
    <small>
    The information transmitted is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged material. Any review, retransmission, dissemination or other use of, or taking of any action in reliance upon, this information by persons or entities other than the intended recipient is prohibited. If you received this in error, please contact the sender and delete the material from any computer. Any views or opinions expressed in this email are solely those of the author and do not necessarily represent those of PT.AISIN INDONESIA AUTOMOTIVE.
    </small>

</i></center></p></font>
              </div>

          </td>
        </tr>

        <tr>
          <td class="container-padding footer-text" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding: 40px; text-align: center">
          <span>Copyright © 2019  SIMPLE EXIM System </span>
          </td>
        </tr>
        
      </table>        
<!--/600px container -->


    </td>

  </tr>

</table>

<!--/100% background wrapper-->

</body>
</html>

