<?php

namespace TomIrons\Tuxedo;

use Illuminate\Mail\Mailable;

class TuxedoMessage extends Mailable
{
    /**
     * The theme for the mailable.
     *
     * @var string
     */
    public $theme = 'tuxedo';

    /**
     * The message's greeting.
     *
     * @var string
     */
    public $greeting;

    /**
     * The message's salutation.
     *
     * @var string
     */
    public $salutation;

    /**
     * Set the greeting of the message.
     *
     * @param string $greeting
     *
     * @return $this
     */
    public function greeting($greeting)
    {
        $this->greeting = $greeting;

        return $this;
    }

    /**
     * Set the salutation of the message.
     *
     * @param string $salutation
     *
     * @return $this
     */
    public function salutation($salutation)
    {
        $this->salutation = $salutation;

        return $this;
    }
}
