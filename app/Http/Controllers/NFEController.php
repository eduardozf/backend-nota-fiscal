<?php

namespace App\Http\Controllers;

use App\Models\NotaFiscal;
use Illuminate\Http\Request;
use App\Jobs\ProcessAsyncOperation;


class NFEController extends Controller
{
    function read(Request $request, $key)
    {
        // Field Validation
        $request->merge(['chave' => $key]);
        $validatedData = $request->validate(['chave' => 'required|numeric|digits:44']);

        // Find by "chave" on database
        $result = NotaFiscal::where('chave', $validatedData['chave'])->get();

        return response()->json($result);
    }

    function create(Request $request)
    {
        // Field Validation
        $validatedData = $request->validate([
            'chave' => 'required|numeric|digits:44',
            'data_emissao' => 'required|date',
            'data_recebimento' => 'required|date',
            'cnpj' => 'required|numeric|digits:14',
        ]);

        // Dispatch the async operation as a job
        ProcessAsyncOperation::dispatch($validatedData);

        return response(null, "202");
    }
}
