<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

final class CoinGeckoCurrenciesService implements CurrenciesService
{
    /**
     * Coingecko API URL
     * 
     * @var string
     * @ref https://www.coingecko.com/en/api/documentation
     */
    protected const BASE_URL = 'https://api.coingecko.com/api/v3/';
    
    /**
     * Supported coins for our system
     * 
     * @var array(
     *     array(id, symbol, name),
     *     ... 
     * )
     */
    protected const SUPPORTED_COINS = [
        ['bitcoin', 'bit', 'Bitcoin'],
        ['ethereum', 'eth', 'Ethereum'],
        ['litecoin', 'ltc', 'Litecoin'],
    ];
    
    /**
     * Constructor
     */
    public function __construct()
    {}
    
    /**
     * {@inheritDoc}
     * @see \App\Services\CurrenciesService::getCoinsList()
     * @return array Array of ['id' => xx, 'symbol' => xx, 'name' => xx]
     */
    public function getCoinsList(): array
    {
        return array_reduce(self::SUPPORTED_COINS, function($result, $item){
            $result[] = [
                'id' => $item[0],
                'symbol' => $item[1],
                'name' => $item[2],
            ];
            
            return $result;
        }, []); 
    }
    
    /**
     * {@inheritDoc}
     * @see \App\Services\CurrenciesService::getCoinPriceUSD()
     * @return array Exactly in the Coingecko simple/price API end point 
     * @ref https://www.coingecko.com/en/api/documentation
     */
    public function getCoinPriceUSD(string $coinIds): array
    {
        return Http::get(self::BASE_URL . 'simple/price?ids=' . $coinIds . '&vs_currencies=usd')->json();        
    }
    
    /**
     * {@inheritDoc}
     * @see \App\Services\CurrenciesService::getDailyHighLowPricesUSD()
     * @return array Array of [high_24h, low_24h]
     */
    public function getDailyHighLowPricesUSD(string $coinId): array
    {
        $response = Http::get(self::BASE_URL . 'coins/markets?ids=' . $coinId . '&vs_currency=usd');
        $responseJson = current($response->json());
        
        return [
            "high_24h" => $responseJson['high_24h'],
            "low_24h" => $responseJson['low_24h'],
        ];
    }
}