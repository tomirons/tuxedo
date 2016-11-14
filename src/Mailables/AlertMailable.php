<?php

namespace TomIrons\Tuxedo\Mailables;

use TomIrons\Tuxedo\Message;
use TomIrons\Tuxedo\TuxedoMailable;

class AlertMailable extends TuxedoMailable
{
    use Message;

    /**
     * The view to use for the message.
     *
     * @var string
     */
    protected $view = 'tuxedo::templates.alert';

    /**
     * The plain text view to use for the message.
     *
     * @var string
     */
    protected $textView = 'tuxedo::templates.alert-plain';

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
     * @return $this
     */
    public function type($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set the alert text for the message.
     *
     * @param $message
     * @return $this
     */
    public function message($message)
    {
        $this->text = $message;

        return $this;
    }
}