<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoComentarioGlucemia extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($comentario, $glucemia_fecha, $glucemia_id, $user_id)
    {
        $this->comentario = $comentario;
        $this->glucemia_fecha = $glucemia_fecha;
        $this->glucemia_id = $glucemia_id;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'comentario' => $this->comentario,
            'glucemia_fecha' => $this->glucemia_fecha,
            'glucemia_id' => $this->glucemia_id,
            'user_id' => $this->user_id,
        ];
    }
}
