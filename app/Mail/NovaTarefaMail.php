<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Tarefa;

class NovaTarefaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $tarefa;
    public $data_limite;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tarefa $tarefa) // posso usar assim no construtor pois estou recebendo um objeto como parametro
    {
        $this->tarefa = $tarefa->tarefa;
        $this->data_limite = date('d/m/Y', strtotime($tarefa->data_limite));
        $this->url = 'http://localhost:8000/tarefa/'.$tarefa->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.nova-tarefa')->subject('Nova tarefa criada!');
    }
}
