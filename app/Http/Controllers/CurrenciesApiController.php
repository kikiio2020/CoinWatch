<?php

namespace App\Http\Controllers;

use App\Services\CurrenciesService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Controller for the 'currencies' API end point
 */
class CurrenciesApiController extends Controller
{
    /**
     * For the /coinsList end point
     * 
     * @param CurrenciesService $currenciesService
     * @return response
     */
    public function getCoinsList (CurrenciesService $currenciesService) : response 
    {
       return response($currenciesService->getCoinsList());
    }

    /**
     * For the coinPriceUSD/{coinIds} end point
     * 
     * @param Request $request
     * @param CurrenciesService $currenciesService
     * @param string Comma separated coin ids
     * @return response
     */
    public function getCoinPriceUSD (Request $request, CurrenciesService $currenciesService, string $coinIds) : response
    {
        return response($currenciesService->getCoinPriceUSD($coinIds));
    }
    
    /**
     * For the dailyHighLowUSD/{coinId} end point
     * 
     * @param Request $request
     * @param CurrenciesService $currenciesService
     * @param string Single coin id
     * @return response
     */
    public function getDailyHighLowPricesUSD (Request $request, CurrenciesService $currenciesService, string $coinId) : response
    {
        return response($currenciesService->getDailyHighLowPricesUSD($coinId));
    }
}
