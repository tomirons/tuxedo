<?php

namespace TomIrons\Tuxedo\Mailables;

use Illuminate\Mail\Mailable;
use TomIrons\Tuxedo\Message;

class ActionMailable extends Mailable
{
    use Message;

    /**
     * The Markdown template for the message.
     *
     * @var string
     */
    public $markdown = 'tuxedo::templates.action';

    /**
     * The "level" of the message (info, success, error).
     *
     * @var string
     */
    public $level = 'info';

    /**
     * The header for the message.
     *
     * @var string|null
     */
    public $header = null;

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
     * Indicate that the message gives information about a successful operation.
     *
     * @return $this
     */
    public function success()
    {
        $this->level = 'success';

        return $this;
    }

    /**
     * Indicate that the message gives information about an error.
     *
     * @return $this
     */
    public function error()
    {
        $this->level = 'error';

        return $this;
    }

    /**
     * Set the "level" of the message (success, error, etc.).
     *
     * @param  string $level
     * @return $this
     */
    public function level($level)
    {
        $this->level = $level;

        return $this;
    }

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

    /**
     * Configure the "call to action" button.
     *
     * @param  string $text
     * @param  string $url
     * @return $this
     */
    public function action($text, $url)
    {
        $this->actionText = $text;
        $this->actionUrl = $url;

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
        if (! $this->actionText) {
            $this->introLines[] = $this->formatLine($line);
        } else {
            $this->outroLines[] = $this->formatLine($line);
        }

        return $this;
    }
}