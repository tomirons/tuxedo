<?php

namespace TomIrons\Tuxedo\Traits;

trait HasGreeting
{
    /**
     * The message's greeting.
     *
     * @var string|null
     */
    public $greeting = null;

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
}
