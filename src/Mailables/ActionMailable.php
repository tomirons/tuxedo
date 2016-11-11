<?php

namespace TomIrons\Tuxedo\Mailables;

use TomIrons\Tuxedo\TuxedoMailable;

class ActionMailable extends TuxedoMailable
{
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