<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class CopyController extends Controller
{
    public function index(): View
    {
        return view('copy');
    }

    public function copyAcao(Request $r): View
    {
        // $apiKey = getenv('OPENAI_API_KEY');
        // $client = OpenAI::client($apiKey);
        // $response = $client->chat()->create([
        //     'model' => 'gpt-4o-mini',
        //     'messages' => [
        //         [
        //             'role' => 'user',
        //             'content' => 'Hello'
        //         ]
        //     ]
        // ]);

        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            // 'prompt' => 'O php é...'
            'messages' => [
                ['role' => 'user', 'content' => 'Responda como um profissional de copywritter!'],
                ['role' => 'user', 'content' => 'Quero criar a copy para um produto chamado: ' . $r->nome_produto],
                ['role' => 'user', 'content' => 'o Produto será vendido por: R$ ' . $r->preco_produto],
                ['role' => 'user', 'content' => 'As principais características do produto são: ' . $r->caracteristicas_produto],
                ['role' => 'user', 'content' => 'A copy deve ser criada de forma que se comunique bem com o público alvo que é: ' . $r->publico_alvo],
                ['role' => 'user', 'content' => 'O estilo de escrita da copy deve ser muito: ' . $r->estilo_copy],
            ]
        ]);
        $data['copyGerada'] = $result->choices[0]->message->content;
        return view('copy', $data);
    }
}
