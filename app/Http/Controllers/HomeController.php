<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index(Request $r): View
    {
        return view('home');
    }

    public function ingredientes(Request $r): View
    {
        return view('ingredientes');
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
                "prompt" => 'Gere uma receita incrivel SOMENTE com os seguintes ingredientes:' . $r->ingredientes . ' e não inclua ingredientes extras! Se não conseguir gerar a receita mande a pessoa ir ao mercado.',
                "temperature" => 0.5,
                "max_tokens" => 500
            ]
        ]);
        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            $viewData['receita'] = $data['choices'][0]['text'];
            $viewData['ingredientes'] = $r->ingredientes;
            return view('ingredientes', $viewData);
        } else {
            ['error' => 'Erro ao obter a receita. Por favor, tente novamente.'];
        }
    }
}
