<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class CryptoController extends Controller
{
    /**
     * Display the cryptocurrency prices page
     */
    public function index(): View
    {
        return view('crypto.prices');
    }

    /**
     * Fetch cryptocurrency data from CoinGecko API
     */
    public function fetchPrices()
    {
        try {
            // Fetch data in USD
            $responseUSD = Http::timeout(10)->get('https://api.coingecko.com/api/v3/coins/markets', [
                'vs_currency' => 'usd',
                'order' => 'market_cap_desc',
                'per_page' => 10,
                'page' => 1,
                'sparkline' => false,
            ]);

            // Fetch data in IDR
            $responseIDR = Http::timeout(10)->get('https://api.coingecko.com/api/v3/coins/markets', [
                'vs_currency' => 'idr',
                'order' => 'market_cap_desc',
                'per_page' => 10,
                'page' => 1,
                'sparkline' => false,
            ]);

            if ($responseUSD->failed() || $responseIDR->failed()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to fetch data from CoinGecko API'
                ], 500);
            }

            $coinsUSD = $responseUSD->json();
            $coinsIDR = $responseIDR->json();

            // Combine USD and IDR data
            $formattedCoins = collect($coinsUSD)->map(function ($coin, $key) use ($coinsIDR) {
                $coinIDR = $coinsIDR[$key] ?? [];
                
                return [
                    'id' => $coin['id'] ?? '',
                    'symbol' => strtoupper($coin['symbol'] ?? ''),
                    'name' => $coin['name'] ?? '',
                    'image' => $coin['image'] ?? '',
                    'current_price_usd' => $coin['current_price'] ?? 0,
                    'current_price_idr' => $coinIDR['current_price'] ?? 0,
                    'market_cap_rank' => $coin['market_cap_rank'] ?? '-',
                    'price_change_percentage_24h' => $coin['price_change_percentage_24h'] ?? 0,
                    'market_cap' => $coin['market_cap'] ?? 0,
                    'total_volume' => $coin['total_volume'] ?? 0,
                ];
            })->toArray();

            return response()->json([
                'success' => true,
                'data' => $formattedCoins,
                'timestamp' => now()->toDateTimeString()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
