<?php

namespace App\Services;

/**
 * For adopting the 'currencies' end point
 */
interface CurrenciesService 
{
    /**
     * Get list of supported coins for our system
     * 
     * @param null
     * @return array
     */
    public function getCoinsList(): array;
    
    /**
     * Given list of coin IDs return their prices in USD
     * 
     * @param string Comma separated coin ids
     * @return array
     */
    public function getCoinPriceUSD(string $coinIds): array;
    
    /**
     * Given a single coin ID return its 24 hour high low value
     *  
     * @param string Single coin id
     * @return array
     */
    public function getDailyHighLowPricesUSD(string $coinId): array;
}