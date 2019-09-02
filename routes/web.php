<?php
use App\Http\Middleware\CheckLogin;
Auth::routes();
Route::group(['middleware' => [CheckLogin::class]], function () {

/*Report*/
Route::get('/report','ShipmentController@report');
Route::get('/intransit','ShipmentController@intransit');
Route::get('/report_etd','ShipmentController@report_etd');
Route::get('/report_ata','ShipmentController@report_ata');
/*Invoice Forwader*/
Route::get('/create/iv/{id}','ivController@index');
Route::post('/create/iv/{id}','ivController@store');	
Route::get('/del/iv/{id}','ivController@destroy');
Route::get('/iv/forwader/{id}/edit','ivController@edit');

Route::get('/email/{id}','ShipmentController@email');	

/*Shipment List Route*/
Route::get('/', 'ShipmentController@index');
Route::get('/home', 'ShipmentController@home');
Route::get('/done', 'ShipmentController@done');
/*Invoice Shipment List*/
Route::get('/done/ok', 'ShipmentController@done_ok');
Route::get('/done/not', 'ShipmentController@done_nok');

/*Portal Shipment email*/
Route::get('/delete/{id}', 'ShipmentController@del');
Route::get('/{id}/edit/', 'ShipmentController@edit');
Route::put('/{id}', 'ShipmentController@update');
Route::put('/update2/{id}', 'ShipmentController@update2');
Route::get('/print/{id}', 'ShipmentController@print1');
Route::get('/upload/{id}', 'ShipmentController@upload');
Route::post('/upload_data/{id}', 'ShipmentController@upload_data');
Route::get('/invoice_file/{id}','ShipmentController@invoice_file');
Route::get('/create','ShipmentController@create');
Route::post('/create','ShipmentController@store');
Route::put('/update/{id}','ivController@update');
Route::get('/show/{id}','ShipmentController@show');
Route::get('/portal','ShipmentController@portal');
Route::get('/inventory','ShipmentController@inventory');
});

/*Route kasir*/
Route::get('/inventory/kasir','ShipmentController@inventory_kasir');

/*Control Quota*/
Route::get('/quota','ShipmentController@quota');

Route::get('/email_quota','ShipmentController@email_quota');
Route::get('/email_quota2','ShipmentController@email_quota2');



























Route::get('/sk', function () {	
    $a = new \PhpOffice\PhpWord\TemplateProcessor(public_path('all.docx'));
    $a->setValue('NOMOR', '298/G/EXIM/AIIA/VII/2019');
    $a->setValue('NAMA', 'Herlina Trisnawati');
    $a->setValue('JABATAN', 'Direktur');
    $a->setValue('KOTA', 'Karawang');
    $a->setValue('TANGGAL', date('d F Y'));
    $a->setValue('NOMOR1', '1 / SKPI /PUR/ AIIA / VIII / 2019');
    $a->setValue('NO2', '1 / SKPD /PUR/ AIIA / VIII / 2019');
    $a->setValue('NO3', '1 / SKPI /PUR/ AIIA / VIII / 2019');
    $a->setValue('NAMA', 'Herlina Trisnawati');
    $a->setValue('JABATAN', 'Direktur');
	$a->setValue('JABATAN_FWD', 'Direktur');
	$a->setValue('INVOICE', 'OE-34215855');    
	$a->setValue('TOTAL', 'JPY 19.000');
    $a->setValue('KOTA', 'Karawang');
    $a->setValue('FWD', 'PT YAMATO INDONESIA FORWARDING');
    $a->setValue('NPWP', '83.047.484.7-402.00');
    $a->setValue('NAMA_FWD', 'MUHAMAD NIZAR SANUSI');
    $a->setValue('ALAMAT', 'KOMPLEK PERGUDANGAN SOEWARNA UNIT E-6,SOEWARNA BUSINESS PARK B LOT 7-8 PAJANG BENDA KOTA TANGERANG');
    $a->setValue('TEL', '021-572-3251 / 021-8899-1966');
    $a->setValue('BARANG','PLUG, OIL PUMP RELIEF VALVE' );
    $a->setValue('PEMASOK','OHASHI TECHNICA (THAILAND) CO., LTD' );
    $a->setValue('KAPAL','OOCLJAKARTA V.1920S' );
    $a->setValue('BL', 'YTC-BKK13827TH764 / 18 September 2019');
    $a->setValue('JML', '1,860 KG / 6 SKIDS');
    $a->setValue('BY', 'AIR');
    $a->setValue('ALIAS', 'PLUG, OIL PUMP RELIEF VALVE');
    $a->setValue('BULAN', 'AGUSTUS 2019');
    $a->setValue('ETD', '13 AGUSTUS 2019');
    $a->setValue('ETA', '20 AGUSTUS 2019');
    
    try{
        $a->saveAs(storage_path('all.docx'));        
    }catch (Exception $e){
        //handle exception
    }

    return response()->download(storage_path('all.docx'));    
	});

Auth::routes();

Route::get('/home', 'HomeController@index');
