<?php

namespace TomIrons\Tuxedo\Mailables;

use TomIrons\Tuxedo\Traits\HasAction;
use TomIrons\Tuxedo\Traits\HasLine;
use TomIrons\Tuxedo\TuxedoMessage;

class ActionMailable extends TuxedoMessage
{
    use HasAction;
    use HasLine;

    /**
     * The Markdown template for the message (if applicable).
     *
     * @var string
     */
    public $markdown = 'tuxedo::templates.action';
}
