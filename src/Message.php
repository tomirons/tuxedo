<?php

/**
 * @credit Taylor Ottwell for the base of this trait, used `SimpleMessage` from laravel/laravel
 */

namespace TomIrons\Tuxedo;

trait Message
{
    /**
     * The "level" of the notification (info, success, error).
     *
     * @var string
     */
    public $level = 'info';

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
     * The text / label for the action.
     *
     * @var string
     */
    public $actionText;

    /**
     * The action URL.
     *
     * @var string
     */
    public $actionUrl;

    /**
     * Indicate that the notification gives information about a successful operation.
     *
     * @return $this
     */
    public function success()
    {
        $this->level = 'success';

        return $this;
    }

    /**
     * Indicate that the notification gives information about an error.
     *
     * @return $this
     */
    public function error()
    {
        $this->level = 'error';

        return $this;
    }

    /**
     * Set the "level" of the notification (success, error, etc.).
     *
     * @param  string  $level
     * @return $this
     */
    public function level($level)
    {
        $this->level = $level;

        return $this;
    }

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
        return $this->newLine($line);
    }

    /**
     * Add a line of text to the message.
     *
     * @param  string|array  $line
     * @return $this
     */
    public function newLine($line)
    {
        if (! $this->actionText) {
            $this->introLines[] = $this->formatLine($line);
        } else {
            $this->outroLines[] = $this->formatLine($line);
        }

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
        if (is_array($line)) {
            return implode(' ', array_map('trim', $line));
        }

        return trim(implode(' ', array_map('trim', preg_split('/\\r\\n|\\r|\\n/', $line))));
    }

    /**
     * Configure the "call to action" button.
     *
     * @param  string  $text
     * @param  string  $url
     * @return $this
     */
    public function action($text, $url)
    {
        $this->actionText = $text;
        $this->actionUrl = $url;

        return $this;
    }
}