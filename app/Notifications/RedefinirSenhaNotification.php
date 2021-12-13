<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RedefinirSenhaNotification extends Notification
{
    use Queueable;
    public $token;
    public $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $email, $name)
    {
        $this->token = $token;
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $minutos = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        $url = 'http://localhost:8000/password/reset/'.$this->token.'?email='.$this->email;
        $saudacao = 'Olá '.$this->name;

        return (new MailMessage)
            ->subject('Atualização de senha')
            ->greeting($saudacao)
            ->line('Você está recebendo este e-mail pois nós recebermos uma solicitação de redefinição de senha')
            ->action('Redefinir Senha', $url)
            ->line("Este link de redefinição expira em $minutos minutos.", )
            ->line('Se você não solicitou esta redefinição, ignore este e-mail.')
            ->salutation('Até logo!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
