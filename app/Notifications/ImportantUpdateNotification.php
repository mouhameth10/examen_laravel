<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ImportantUpdateNotification extends Notification
{
    use Queueable;

    protected $update;

    public function __construct($update)
    {
        $this->update = $update;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Mise à jour importante')
            ->line('Il y a une mise à jour importante concernant : ' . $this->update)
            ->action('Voir les détails', url('/updates')) // Changez l'URL selon vos besoins
            ->line('Merci de rester informé!');
    }

    public function toArray($notifiable)
    {
        return [
            'update' => $this->update,
        ];
    }
}