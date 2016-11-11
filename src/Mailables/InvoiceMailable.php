<?php

namespace TomIrons\Tuxedo\Mailables;

use TomIrons\Tuxedo\Message;
use TomIrons\Tuxedo\TuxedoMailable;

class InvoiceMailable extends TuxedoMailable
{
    use Message;

    /**
     * The view to use for the message.
     *
     * @var string
     */
    public $view = 'tuxedo::templates.invoice';

    public $items = [];

    public function item($name, $price)
    {
        $this->items[] = [
            'name' => $name,
            'price' => $price
        ];

        return $this;
    }
}