<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\MailConfig;
 
class SendForm extends Mailable
{
    use Queueable, SerializesModels;
 
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        return $this->from('beau@gmail.com', $data['mail_name'])->view('emails.SendForm')->subject($data['mail_subject']);
    }
}