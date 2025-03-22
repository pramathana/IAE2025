<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['rate' => null, 'from_currency' => 'USD', 'to_currency' => 'IDR']);
});

Route::post('/get-rate', function () {
    #$apiKey = 'XK0JRAD9I9BXDPJL';
    $apiKey = env('ALPHA_VANTAGE_API_KEY');
    $fromCurrency = request('from_currency');
    $toCurrency = request('to_currency');
    
    $url = "https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency={$fromCurrency}&to_currency={$toCurrency}&apikey={$apiKey}";
    
    $response = Http::get($url);
    $data = $response->json();
    
    $rate = $data['Realtime Currency Exchange Rate']['5. Exchange Rate'] ?? 'N/A';
    
    return view('welcome', [
        'rate' => $rate,
        'from_currency' => $fromCurrency,
        'to_currency' => $toCurrency
    ]);
});