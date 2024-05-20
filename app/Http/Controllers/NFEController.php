<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class NFEController extends Controller
{

    function read(Request $request)
    {
        // Field Validation
        $validated = $request->validate([
            'chave' => 'required|numeric|digits:44',
        ]);

        // TODO Validar se tem o campo chave
        // TODO Retornar todas notas com a mesma chave

    }

    function create(Request $request)
    {
        // Field Validation
        $request->validate([
            'chave' => 'required|numeric|digits:44',
            'data_emissao' => 'required|date',
            'data_recebimento' => 'required|date',
            'cnpj' => 'required|numeric|digits:14',
        ]);

        // error_log("MEU TEST");

        // TODO Extrair chamada de micro serviço para um Service
        Http::async()
            ->post('http://localhost:3334/valida', ['cnpj' => $request->cnpj])
            ->then(
                function ($res) use ($request) {
                    Log::info("DEU BAO");
                    // Log::info($res->getStatusCode() . "\n");
                    // return $request->status(202);

                    // TODO inserir em memoria
                },
                function ($e) {
                    Log::info($e->getMessage() . "\n");
                    // TODO LOG
                    // echo $e->getRequest()->getMethod();
                }
            )
            // ->wait();

        return response("UNDEFINED", "202");
    }
}
