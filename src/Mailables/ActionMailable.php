<?php

namespace TomIrons\Tuxedo\Mailables;

use Illuminate\Mail\Mailable;
use TomIrons\Tuxedo\Message;
use TomIrons\Tuxedo\Traits\HasAction;
use TomIrons\Tuxedo\Traits\HasGreeting;
use TomIrons\Tuxedo\Traits\HasLine;

class ActionMailable extends Mailable
{
    use HasAction, HasGreeting, HasLine;

    /**
     * The Markdown template for the message (if applicable).
     *
     * @var string
     */
    public $markdown = 'tuxedo::templates.action';

    /**
     * Add a line of text to the message.
     *
     * @param string|array $line
     *
     * @return $this
     */
    public function line($line)
    {
        if (!$this->actionText) {
            $this->introLines[] = $this->formatLine($line);
        } else {
            $this->outroLines[] = $this->formatLine($line);
        }

        return $this;
    }
}
