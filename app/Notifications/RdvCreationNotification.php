<?php

namespace App\Notifications;

use App\Http\Requests\RendezvousStore;
use App\Models\Rendezvous;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RdvCreationNotification extends Notification
{
    use Queueable;

    public $rendezVous;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($rendezVous)
    {
        $this->rendezVous  = $rendezVous;
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
                    ->line('Bonjour, une nouvelle demande de rendez-vous a été enregistrée sur votre site Internet.')
                    ->action('Voir les détails', route('show', $this->rendezVous->id))
                    ->line('Merci !');
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
