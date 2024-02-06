<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Edition;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApplicationApprovedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Edition $edition, public User $applicant)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        // $url = url('/invoice/'.$this->invoice->id);


        return (new MailMessage)
            ->view('emails.application-approved', [
                'applicant' => $notifiable,  // Pass the applicant (recipient) to the template
                'edition' => $this->edition,  // Access passed edition
            ])
            ->subject('Application Approved')
            ->line('Your application has been approved.')
            ->line('Kindly visit your dashboard to effect payment to reserve your seat.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');

        // return (new MailMessage)
        //     ->subject('Application Approved')
        //     ->line('Your application has been approved.')
        //     ->line('Kindly visit your dashboard to effect payment to reserve your seat.')
        //     ->action('Notification Action', url('/'))
        //     ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
