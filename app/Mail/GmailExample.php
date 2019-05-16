<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GmailExample extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->from('chentito002@gmail.com', 'Carlos Reyes')
            ->subject('Ejemplo de envio de correo electronico')
            ->markdown('crmmex.mail.gmail')
            ->with([
                'name' => 'Joe Doe',
                'link' => 'http://www.bryceandy.com'
            ]);
    }
}
