<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
  <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->
  <title>Daily Shipment Report</title>
  
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

          <div class="title" style="font-family:colonnaMT;font-size:25px;font-weight:600;color:#374550;">Daily Shipment Report Update {{date("F j, Y, g:i a")}}</div>
          
          <hr>         
            <table class="table-custom">
			<thead>
        @foreach($row as $row)
				<tr bgcolor="#00ccff">
					<th rowspan='2'>Name Of Goods</th>
          <th rowspan='2'>PO</th>
          <th rowspan='2'>Supplier</th>
					<th rowspan='2'>By</th>
					<th rowspan='2'>Estimated Time Departure {{$row->origin}}</th>
					<th rowspan='2'>Estimated Time Arrival Jakarta</th>
          <th rowspan='2'>Number Container</th>
					<th rowspan='2'>Estimated Time Arrival AIIA</th>
          @if(
          $row->draft_pib==""&&$row->check_pib==""&&$row->rcv_doc_ori==""&&$row->create_sk==""&&
          $row->send_sk_doc_ori==""&&$row->ppjk_rcv_sk_doc_ori==""&&$row->proses_pay_id==""&&$row->pay_id==""&&$row->pick_do==""&&
          $row->sppb==""&&$row->deliv_aiia==""
          )          
          <th colspan='1'>Status</th>
          @elseif($row->check_pib==""&&$row->rcv_doc_ori==""&&$row->create_sk==""&&
          $row->send_sk_doc_ori==""&&$row->ppjk_rcv_sk_doc_ori==""&&$row->proses_pay_id==""&&$row->pay_id==""&&$row->pick_do==""&&
          $row->sppb==""&&$row->deliv_aiia=="")
          <th colspan='2'>Status</th>
          @elseif($row->create_sk==""&&
          $row->send_sk_doc_ori==""&&$row->ppjk_rcv_sk_doc_ori==""&&$row->proses_pay_id==""&&$row->pay_id==""&&$row->pick_do==""&&
          $row->sppb==""&&$row->deliv_aiia=="")

          <th colspan='3'>Status</th>
          @elseif($row->rcv_doc_ori==""&&
          $row->send_sk_doc_ori==""&&$row->ppjk_rcv_sk_doc_ori==""&&$row->proses_pay_id==""&&$row->pay_id==""&&$row->pick_do==""&&
          $row->sppb==""&&$row->deliv_aiia=="")
          <th colspan='4'>Status</th>
          @elseif(
          $row->send_sk_doc_ori==""&&$row->ppjk_rcv_sk_doc_ori==""&&$row->proses_pay_id==""&&$row->pay_id==""&&$row->pick_do==""&&
          $row->sppb==""&&$row->deliv_aiia=="")
          <th colspan='5'>Status</th>
          @elseif(
          $row->ppjk_rcv_sk_doc_ori==""&&$row->proses_pay_id==""&&$row->pay_id==""&&$row->pick_do==""&&
          $row->sppb==""&&$row->deliv_aiia=="")
          <th colspan='6'>Status</th>
          @elseif(
          $row->proses_pay_id==""&&$row->pay_id==""&&$row->pick_do==""&&
          $row->sppb==""&&$row->deliv_aiia=="")
          <th colspan='7'>Status</th>
          @elseif(
          $row->pay_id==""&&$row->pick_do==""&&
          $row->sppb==""&&$row->deliv_aiia=="")
          <th colspan='8'>Status</th>
          @elseif(
          $row->pick_do==""&&
          $row->sppb==""&&$row->deliv_aiia=="")
          <th colspan='9'>Status</th>
          @elseif(          
          $row->sppb==""&&$row->deliv_aiia=="")
          <th colspan='10'>Status</th>
          @elseif(          
          $row->deliv_aiia=="")
          <th colspan='11'>Status</th>
          @else
          <th colspan='12'>Status</th>
          @endif
          <th rowspan='2'>Remark</th>                    
				</tr>
        <tr bgcolor="#00ccff">
        <th>{{date('d/m/Y', strtotime($row->rcv_pre_alert))}}</th>                    
        @if($row->draft_pib=="")
        @else
        <th>{{date('d/m/Y', strtotime($row->draft_pib))}}</th>          
        @endif
        @if($row->check_pib=="")
        @else
        <th>{{date('d/m/Y', strtotime($row->check_pib))}}</th>
        @endif
        @if($row->create_sk=="")
        @else
        <th>{{date('d/m/Y', strtotime($row->create_sk))}}</th>
        @endif
        @if($row->rcv_doc_ori=="")
        @else
        <th>{{date('d/m/Y', strtotime($row->rcv_doc_ori))}}</th>
        @endif
        @if($row->send_sk_doc_ori=="")
        @else
        <th>{{date('d/m/Y', strtotime($row->send_sk_doc_ori))}}</th>
        @endif
        @if($row->ppjk_rcv_sk_doc_ori=="")
        @else      
        <th>{{date('d/m/Y', strtotime($row->ppjk_rcv_sk_doc_ori))}}</th>
        @endif
        @if($row->proses_pay_id=="")
        @else
        <th>{{date('d/m/Y', strtotime($row->proses_pay_id))}}</th>
        @endif
        @if($row->pay_id=="")
        @else
        <th>{{date('d/m/Y', strtotime($row->pay_id))}}</th>
        @endif
        @if($row->pick_do=="")
        @else
        <th>{{date('d/m/Y', strtotime($row->pick_do))}}</th>
        @endif
        @if($row->sppb=="")
        @else
        <th>{{date('d/m/Y', strtotime($row->sppb))}}</th>
        @endif
        @if($row->deliv_aiia=="")
        @else
        <th>{{date('d/m/Y', strtotime($row->deliv_aiia))}}</th>
        @endif
        </tr>
			</thead>
			<tbody>
				
				<tr bgcolor="#e6e6e6">
					<th>{{$row->shipment}}</th>
					<th>{{$row->po}}</th>
          <th>{{$row->suplier}}</th>
          <th>{{$row->ship_by}}</th>
					<th>{{date('d-M-Y', strtotime($row->etd))}}</th>
					<th>{{date('d-M-Y', strtotime($row->eta))}}</th>
          <th>{{$row->cont}}</th>
					<th>{{date('d-M-Y', strtotime($row->aiia_plan))}}</th>          
          <th>Received Pre Alert</th>          
          @if($row->draft_pib=="")
          @else
          <th>Draft Pemberitahuan Import Barang</th>          
          @endif
          @if($row->check_pib=="")
          @else
          <th>Check Pemberitahuan Import Barang</th>
          @endif
          @if($row->create_sk=="")
          @else
          <th>Create Surat Kuasa</th>
          @endif
          @if($row->rcv_doc_ori=="")
          @else
          <th>Received Document Original</th>
          @endif
          
          @if($row->send_sk_doc_ori=="")
          @else
          <th>Send Surat Kuasa + Document Ori To PPJK</th>
          @endif
          @if($row->ppjk_rcv_sk_doc_ori=="")
          @else      
          <th>PPJK Received Surat Kuasa+Document original</th>
          @endif
          @if($row->proses_pay_id=="")
          @else
          <th>Proses Payment Import Duty</th>
          @endif
          @if($row->pay_id=="")
          @else
          <th>Payment Import Duty</th>
          @endif
          @if($row->pick_do=="")
          @else
          <th>Pick UP Delivery Order</th>
          @endif
          @if($row->sppb=="")
          @else
          <th>Surat Persetujuan Pengeluaran Barang</th>
          @endif
          @if($row->deliv_aiia=="")
          @else
          <th>Delivery to AIIA</th>
          @endif          
          <th>{{$row->remark}}</th>
				</tr>
				@endforeach
			</tbody>
              </table>
              <p align="left"><font color="#0044cc">Improved By EXIM Section</font></p>
              <font color="#0044cc"><p align="justify"><i><center><b><u>Disclaimer</u></b></center></font><center> 
<font size="2px"  color="#0044cc">The information transmitted is intended only for the person or entity to which it is addressed and may contain confidential and/or privileged material. Any review, retransmission, dissemination or other use of, or taking of any action in reliance upon, this information by persons or entities other than the intended recipient is prohibited. If you received this in error, please contact the sender and delete the material from any computer. Any views or opinions expressed in this email are solely those of the author and do not necessarily represent those of PT.AISIN INDONESIA AUTOMOTIVE.
</i></center></p></font>
              </div>

          </td>
        </tr>

        <tr>
          <td class="container-padding footer-text" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding: 40px; text-align: center">
          <span>Copyright © 2018  SIMPLE EXIM System </span>
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

