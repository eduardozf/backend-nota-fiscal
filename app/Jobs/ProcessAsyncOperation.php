<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\NotaFiscal;


class ProcessAsyncOperation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $validatedData;

    public function __construct(array $validatedData)
    {
        $this->validatedData = $validatedData;
    }

    public function handle()
    {
        $BASE_URL = 'http://localhost:3334';
        $endpoint = $BASE_URL . '/valida';

        $response = Http::post($endpoint, ['cnpj' => $this->validatedData['cnpj']]);

        // If valid: Insert NotaFiscal into database
        if ($response->successful()) {
            NotaFiscal::create($this->validatedData);
        }
        // If not valid: Log error message
        else if ($response->clientError()) {
            $LogMessage = "(+) Invalid CNPJ\nRequest: " . print_r($this->validatedData, true) . "\nResponse: " . $response->body() . "\n(-)";
            Log::info($LogMessage);
        }
    }
}
