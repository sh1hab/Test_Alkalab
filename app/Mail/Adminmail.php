<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Adminmail  extends Mailable
{
    use Queueable, SerializesModels;

    public $question_answers,$total_answers;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($question_answers,$total_answers)
    {
        $this->total_answers=$total_answers;
        $this->question_answers = $question_answers;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.admin')->with([
            'total_answers' => $this->total_answers,
            'question_answers' => $this->question_answers,
        ]);
    }
}
