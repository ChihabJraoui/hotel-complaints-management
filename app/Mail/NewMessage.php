<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $address;
    public $name;
    public $content;

	/**
	 * Create a new message instance.
	 *
	 * @param $address
	 * @param $name
	 * @param $content
	 */
    public function __construct($address, $name, $content)
    {
        $this->address = $address;
        $this->name = $name;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    	$to_address = env('MAIL_TO_ADDRESS');
    	$to_name = env('MAIL_TO_NAME');

    	$bcc_address = env('MAIL_BCC_ADDRESS');
    	$bcc_name = env('MAIL_BCC_ADDRESS');

        return $this->view('emails.message')
	        ->subject('New Message')
	        ->to($to_address, $to_name)
	        ->bcc($bcc_address, $bcc_name)
	        ->replyTo($this->address, $this->name);
    }
}
