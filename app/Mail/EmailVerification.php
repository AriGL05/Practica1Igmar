<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\EmailVerificationToken;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Account Activation Mail',
        );
    }

    public function build()
    {
        $newToken = Str::random(64);

        $token = new EmailVerificationToken();
        $token->token = bcrypt($newToken);
        $token->user_id = $this->user->id;
        $token->save();

        $url = URL::signedRoute('email.verify', ['user_id' => $this->user->id, 'token' => $newToken]);

        return $this->markdown('email.emailverification', ['url' => $url])
            ->with(['url' => $url]);


    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
