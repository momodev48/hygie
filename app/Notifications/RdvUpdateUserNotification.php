<?php

namespace App\Notifications;

use App\Http\Requests\RendezvousStore;
use App\Models\Rendezvous;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RdvUpdateUserNotification extends Notification
{
    use Queueable;

    protected $rendezVous;
    protected $msg;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($rendezVous, $msg)
    {
        $this->rendezVous  = $rendezVous;
        $this->message = $msg;
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
        return (new MailMessage)
                    ->subject('Confirmation de votre rendez-vous.')
                  /*   ->action('Notification Action', url('/')) */
                    ->greeting('Bonjour,')
                    ->line('Ceci est une confirmation de votre rendez-vous.')
                    ->line('Date : '.$this->rendezVous->date)
                    ->line('Heure : '.$this->rendezVous->heure)
                    ->line('Commentaire : '.$this->message)
                    ->line("Veuillez se présenter 15 minutes à l'avance et muni de votre carte d'identité et une vignette de votre mutuelle.");
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
