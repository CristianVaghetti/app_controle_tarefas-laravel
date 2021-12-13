<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Tarefa;

class EditTarefaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $tarefa;
    public $data_limite;
    public $nova_tarefa;
    public $nova_data_limite;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tarefa $tarefa, Request $request) // posso usar assim no construtor pois estou recebendo um objeto como parametro
    {
        $this->tarefa = $tarefa->tarefa;
        $this->data_limite = date('d/m/Y', strtotime($tarefa->data_limite));
        $this->url = 'http://localhost:8000/tarefa/'.$tarefa->id;
        $this->nova_tarefa = $request->tarefa;
        $this->nova_data_limite = date('d/m/Y', strtotime($request->data_limite));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.edit-tarefa')->subject('Tarefa alterada!');
    }
}
