<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BondSettingsController;
use App\Http\Controllers\CommonSettingsController;
use App\Http\Controllers\PurchasePriceSettingsController;
use App\Http\Controllers\TransferdutyController;
use App\Models\CommonSettings;
use App\Models\PurchasePriceSettings;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('bond_settings', BondSettingsController::class);
Route::resource('purchase_settings', PurchasePriceSettingsController::class);
Route::resource('default_settings', CommonSettingsController::class);
Route::resource('transfer_duty', TransferdutyController::class);
