<?php

namespace App\Jobs;

use App\CepLog;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class obterEnderecoLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $cep;
    protected $msg;

    public function __construct($cep, $msg)
    {
        $this->cep = $cep;
        $this->msg = $msg;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        CepLog::create(['cep' => $this->cep, 'mensagem' => $this->msg]);
    }
}
