<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendCodeMail extends Mailable
{
    use Queueable, SerializesModels;


    protected $email;
    protected $firstname;
    protected $codeid;
    protected $vote_item;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $firstname, $codeid, $vote_item)
    {
        $this->email = $email;
        $this->firstname = $firstname;
        $this->codeid = $codeid;
        $this->vote_item = $vote_item;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Vote Code',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.test',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }


    public function build(): sendCodeMail
    {
        return $this->from('admin@ra.inc', 'Registration Authority')
//            ->view()
//            ->subject()
            ->with([
                'email' => $this->email,
                'firstname' => $this->firstname,
                'codeid' => $this->codeid,
                'vote_item' => $this->vote_item,
            ]);
    }
}
