<?php

use Illuminate\Support\Facades\Route;
use CodeDredd\Soap\Facades\Soap;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $response = Soap::baseWsdl('https://tangosf.tx-connect.com/IWS_ASMX/Service.asmx?wsdl')
    ->call('Get_Drivers_V10',[
        'Login'=>[
            'DateTime'=>'2023-09-29T03:49:45',
            'Version'=>'1',
            'Dispatcher'=>'TAWASOL',
            'Password'=>'TAWASOL_1629100048',
            'SystemNr'=>48,
            'ApplicationName'=>'habib',
            'ApplicationVersion'=>'habib',
            'PcName'=>'habib',
            'Integrator'=>'AUTOTEST',
            'Language'=>'en',
        ],
        'DriverSelection'=>[
            'IncludeContactInfo'=>false,
            'IncludeGroups'=>false,
            'IncludeInactiveDrivers'=>false,
            'IncludeLastVehicleInfo'=>true,
            'IncludeLicenseInfo'=>false,
            'IncludeTachoCardInfo'=>true,
            'IncludeUpdateDates'=>true,
            'IncludeHRInfo'=>true,
            'IncludeMyTransicsInfo'=>false,
            'IncludeSocialInfo'=>false,
        ],

    ]);

    dd($response->json(),$response->body(),$response);
    return view('welcome');
});