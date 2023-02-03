<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Requisition;

class CreateContract extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
      public $requisition;
    public function __construct(Requisition $requisition)
    {
        //
        $this->requisition=$requisition;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->subject('Create Contract')
                    ->line('You have a requisition request from '.$this->requisition->author->name.' to create a contract with the subject '.$this->requisition->name)
                    ->action('Create Contract', url('/contracts/requisitions'))
                    ->line('Thank you for using our application!');
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
    public function toDatabase($notifiable)
    {
        return new DatabaseMessage([
            'subject'=>'Create Contract-' .$this->requisition->name,
            'message'=>'You have a requisition request from '.$this->requisition->author->name.' to create a contract with the subject '.$this->requisition->name,
            'action'=>url('/contracts/requisitions'),
            'type'=>'Create Contract'
        ]);

    }
}
