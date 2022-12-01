<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SoldMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $soldToUser;
    protected $postUser;
    protected $post;

    /**
     * Create a new message instance.
     *
     * @param $soldToUserId
     * @param $postUserId
     * @param $postId
     */
    public function __construct($soldToUserId, $postUserId, $postId)
    {
        $this->soldToUser = $soldToUserId;
        $this->postUser = $postUserId;
        $this->post = $postId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = url('/app/rating/' . $this->soldToUser . '/' . $this->post);
        return $this->view('mail.soldMail')->with([
            'url' => $url
        ]);
    }
}
