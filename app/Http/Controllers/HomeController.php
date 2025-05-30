<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index(Request $r): View
    {
        return view('welcome');
    }

    public function ingredientesAcao(Request $r): View
    {
        $client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            ]
        ]);
        $response = $client->post('completions', [
            'json' => [
                "model" => "gpt-4o-mini",
                "prompt" => 'Por favor, Gere uma receita incrivel com os seguintes ingredientes: ' . $r->ingredientes,
                "temperature" => 0.5,
                "max_tokens" => 500
            ]
        ]);
        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            $viewData['Receita'] = $data['choices'][0]['text'];
            return view('welcome', $viewData);
        } else {
            return view('welcome', [
                'error' => 'Erro ao obter a receita. Por favor, tente novamente.'
            ]);
        }
    }
}
