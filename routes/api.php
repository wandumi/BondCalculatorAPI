<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BondSettingsController;
use App\Http\Controllers\TransferdutyController;
use App\Http\Controllers\CommonSettingsController;
use App\Http\Controllers\PurchasePriceSettingsController;

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

Route::controller(AuthController::class)->group(function(){
    Route::post('/register','register');
    Route::post('/login','login');
    Route::get('/users','users');
});

/**
 * Routes Accessible on the calculator 
 * Which is on the homepage
 */
Route::get('bond_settings', [BondSettingsController::class, 'index']);
Route::get('purchase_settings', [PurchasePriceSettingsController::class,'index']);
Route::get('default_settings', [CommonSettingsController::class, 'index']);
Route::get('transfer_duty', [TransferdutyController::class,'index']);

/**
 * Routes for Loggedin users
 */
Route::middleware('auth:sanctum')->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/user', 'user');
        Route::post('/logout','logout');
    });

    Route::get('bond_settings/{bond}', [BondSettingsController::class, 'show']);
    Route::post('bond_settings', [BondSettingsController::class, 'store']);
    Route::put('bond_settings/{bond}', [BondSettingsController::class, 'update']);
    Route::delete('bond_settings/{bond}', [BondSettingsController::class, 'destroy']);

    Route::get('purchase_settings/{purchase}', [PurchasePriceSettingsController::class,'show']);
    Route::post('purchase_settings', [PurchasePriceSettingsController::class,'store']);
    Route::put('purchase_settings/{purchase}', [PurchasePriceSettingsController::class,'update']);
    Route::delete('purchase_settings/{purchase}', [PurchasePriceSettingsController::class,'destroy']);

    Route::get('default_settings/{defaults}', [CommonSettingsController::class, 'show']);
    Route::post('default_settings', [CommonSettingsController::class, 'store']);
    Route::put('default_settings/{defaults}', [CommonSettingsController::class, 'update']);
    Route::delete('default_settings/{defaults}', [CommonSettingsController::class, 'destroy']);

    Route::get('transfer_duty/{transfers}', [TransferdutyController::class,'show']);
    Route::post('transfer_duty', [TransferdutyController::class,'store']);
    Route::put('transfer_duty/{transfers}', [TransferdutyController::class,'update']);
    Route::delete('transfer_duty/{transfers}', [TransferdutyController::class,'destroy']);

});


Route::post('/tokens/create', function (Request $request) {

    $request->validate([
        'email'=> 'required',
        'password' => 'required',
    ]);

    $user = User::whereEmail($request->email)->first();

    if($user){

        $token = $request->user()->createToken($request->token_name);
        return ['token' => $token->plainTextToken];
    }
 
});

