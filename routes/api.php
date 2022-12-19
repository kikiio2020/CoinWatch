<?php

use App\Http\Controllers\CurrenciesApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

\Route::get('coinsList', [CurrenciesApiController::class, 'getCoinsList']);

\Route::get('coinPriceUSD/{coinIds}', [CurrenciesApiController::class, 'getCoinPriceUSD']);

\Route::get('dailyHighLowUSD/{coinId}', [CurrenciesApiController::class, 'getDailyHighLowPricesUSD']);

\Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
