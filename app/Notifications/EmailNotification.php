<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $g, $adm)
    {
        //
        $this->name = $name;
        $this->g = $g;
        $this->adm = $adm;
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
        $g = $this->g == 'F' ? 'Ms.' : 'Mr.';
        return (new MailMessage)
                    ->subject('Admisson Approved')
                    ->greeting('Dear '.$g.' '.$this->name.',')
                    ->line('Congratulations! Your application form has been processed and you have been approved successfully.')
                    ->line('Your admission number is '.$this->adm)
                    ->line('Note that all requirement fees must be fully paid before/on reporting date');
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
