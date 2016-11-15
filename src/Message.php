<?php

/**
 * @credit Taylor Ottwell for the base of this trait, used `SimpleMessage` from laravel/laravel
 */

namespace TomIrons\Tuxedo;

trait Message
{
    /**
     * The message's greeting.
     *
     * @var string|null
     */
    public $greeting = null;

    /**
     * The "intro" lines of the message.
     *
     * @var array
     */
    public $introLines = [];

    /**
     * The "outro" lines of the message.
     *
     * @var array
     */
    public $outroLines = [];

    /**
     * Set the greeting of the message.
     *
     * @param  string $greeting
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
     * @param  string|array $line
     * @return $this
     */
    public function line($line)
    {
        $this->outroLines[] = $this->formatLine($line);

        return $this;
    }

    /**
     * Format the given line of text.
     *
     * @param  string|array $line
     * @return $this
     */
    protected function formatLine($line)
    {
        if (is_array($line)) {
            return implode(' ', array_map('trim', $line));
        }

        return trim(implode(' ', array_map('trim', preg_split('/\\r\\n|\\r|\\n/', $line))));
    }
}