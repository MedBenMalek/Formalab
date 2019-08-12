<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ConfirmationFormateur extends Notification
{
    use Queueable;

    protected $pwd;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pwd)
    {
        $this->pwd = $pwd;
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
                    ->success()
                    ->subject('Inscription')
                    ->line('Confirmer votre compte')
                    ->line('votre mot de passe:')
                    ->line($this->pwd)
                    ->action('Confirmer mon compte', url("/confirm/{$notifiable->id}/".urlencode($notifiable->confirmation_token)))
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
