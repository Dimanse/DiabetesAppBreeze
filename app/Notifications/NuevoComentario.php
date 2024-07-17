<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoComentario extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($comentario, $cita_consulta, $cita_id, $user_id)
    {
        $this->comentario = $comentario;
        $this->cita_consulta = $cita_consulta;
        $this->cita_id = $cita_id;
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

    //Almacena las notificaciones en la base de datos

    public function toDatabase($notifiable)
    {
        return [
            'comentario' => $this->comentario,
            'cita_consulta' => $this->cita_consulta,
            'cita_id' => $this->cita_id,
            'user_id' => $this->user_id,
        ];
    }



}
