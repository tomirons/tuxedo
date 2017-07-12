<?php

namespace TomIrons\Tuxedo\Mailables;

use Illuminate\Mail\Mailable;
use TomIrons\Tuxedo\Message;
use TomIrons\Tuxedo\Traits\HasAction;
use TomIrons\Tuxedo\Traits\HasGreeting;
use TomIrons\Tuxedo\Traits\HasLine;

class ActionMailable extends Mailable
{
    use HasAction,
        HasGreeting,
        HasLine;

    /**
     * The Markdown template for the message (if applicable).
     *
     * @var string
     */
    public $markdown = 'tuxedo::templates.action';
}
