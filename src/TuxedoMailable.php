<?php

namespace TomIrons\Tuxedo;

use Illuminate\Mail\Mailable;

class TuxedoMailable extends Mailable
{
    /**
     * The message's greeting.
     *
     * @var string|null
     */
    public $greeting = null;

    /**
     * The "body" lines of the message.
     *
     * @var array
     */
    public $lines = [];

    /**
     * Set the greeting of the message.
     *
     * @param  string  $greeting
     * @return $this
     */
    public function greeting($greeting)
    {
        $this->greeting = $greeting;

        return $this;
    }

    /**
     * Add a line of text to the message.
     *
     * @param  string  $line
     * @return $this
     */
    public function line($line)
    {
        return $this->addLine($line);
    }

    /**
     * Add a line of text to the message.
     *
     * @param  string|array  $line
     * @return $this
     */
    public function addLine($line)
    {
        $this->lines[] = $this->formatLine($line);

        return $this;
    }

    /**
     * Format the given line of text.
     *
     * @param  string|array  $line
     * @return string
     */
    protected function formatLine($line)
    {
        return trim(implode(' ', array_map('trim', preg_split('/\\r\\n|\\r|\\n/', $line))));
    }
}