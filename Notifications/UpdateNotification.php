<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateNotification extends Notification
{
    use Queueable;

    protected $update;

    public function __construct($update)
    {
        $this->update = $update;
    }

    public function via($notifiable)
    {
        return ['mail']; // Utiliser le canal d'email
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelle Mise à Jour')
            ->line('Une nouvelle mise à jour a été ajoutée : ' . $this->update->title)
            ->action('Voir la Mise à Jour', url('/updates'))
            ->line('Merci d\'utiliser notre application !');
    }
}