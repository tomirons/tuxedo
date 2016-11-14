<?php

namespace TomIrons\Tuxedo\Mailables;

use TomIrons\Tuxedo\Message;
use TomIrons\Tuxedo\TuxedoMailable;

class ActionMailable extends TuxedoMailable
{
    use Message;

    /**
     * The view to use for the message.
     *
     * @var string
     */
    protected $view = 'tuxedo::templates.action';

    /**
     * The plain text view to use for the message.
     *
     * @var string
     */
    protected $textView = 'tuxedo::templates.action-plain';

    /**
     * The header for the message.
     *
     * @var string|null
     */
    public $header = null;

    /**
     * Set the header for the message
     *
     * @param string $header
     * @return $this
     */
    public function header($header)
    {
        $this->header = $header;

        return $this;
    }
}