<?php

namespace TomIrons\Tuxedo\Mailables;

use TomIrons\Tuxedo\Traits\HasLine;
use TomIrons\Tuxedo\TuxedoMessage;

class AlertMailable extends TuxedoMessage
{
    use HasLine;

    /**
     * The Markdown template for the message (if applicable).
     *
     * @var string
     */
    public $markdown = 'tuxedo::templates.alert';

    /**
     * The type of alert.
     *
     * @var string|null
     */
    public $type = null;

    /**
     * The text of the alert.
     *
     * @var string|null
     */
    public $text = null;

    /**
     * Set the type of alert for the message.
     *
     * @param string $type
     *
     * @return $this
     */
    public function type($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set the alert "message" for the message.
     *
     * @param string $text
     *
     * @return $this
     */
    public function message($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Set the type of the alert to "info".
     *
     * @return $this
     */
    public function info()
    {
        return $this->type('info');
    }

    /**
     * Set the type of the alert to "warning".
     *
     * @return $this
     */
    public function warning()
    {
        return $this->type('warning');
    }

    /**
     * Set the type of the alert to "success".
     *
     * @return $this
     */
    public function success()
    {
        return $this->type('success');
    }

    /**
     * Set the type of the alert to "error".
     *
     * @return $this
     */
    public function error()
    {
        return $this->type('error');
    }
}
