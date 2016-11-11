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
    public $view = 'tuxedo::templates.alert';

    /**
     * The type of alert.
     *
     * @var string|null
     */
    public $alertType = null;

    /**
     * The text of the alert.
     *
     * @var string|null
     */
    public $alertText = null;

    /**
     * Set the alert type and text for the message.
     *
     * @param string $type
     * @param string $text
     * @return $this
     */
    public function alert($type, $text)
    {
        $this->alert = true;
        $this->alertType = $type;
        $this->alertText = $text;

        return $this;
    }
}