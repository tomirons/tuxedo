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

    /**
     * The user's name
     *
     * @var string|null
     */
    public $name = null;

    /**
     * The invoice Number
     *
     * @var string|null
     */
    public $invoiceNumber = null;

    /**
     * The invoice date
     *
     * @var string|null
     */
    public $date = null;

    /**
     * The invoice total
     *
     * @var string|null
     */
    public $total = null;

    /**
     * The items that are on the invoice
     *
     * @var array
     */
    public $items = [];

    /**
     * Add an item to the invoice
     *
     * @param string $name
     * @param string|integer $price
     * @return $this
     */
    public function item($name, $price)
    {
        $this->items[] = [
            'name' => $name,
            'price' => $price
        ];

        $this->total += $price;

        return $this;
    }

    /**
     * Set the information for the invoice
     *
     * @param string $name
     * @param string|integer $number
     * @param string $date
     * @return $this
     */
    public function information($name, $number, $date)
    {
        $this->name = $name;
        $this->invoiceNumber = $number;
        $this->date = $date;

        return $this;
    }
}