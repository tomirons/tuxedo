<?php

namespace TomIrons\Tuxedo\Mailables;

use Illuminate\Mail\Mailable;
use TomIrons\Tuxedo\Message;

class InvoiceMailable extends Mailable
{
    use Message;

    /**
     * The view to use for the message.
     *
     * @var string
     */
    public $view = 'tuxedo::templates.invoice';

    /**
     * The plain text view to use for the message.
     *
     * @var string
     */
    protected $textView = 'tuxedo::templates.invoice-plain';

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
    public $number = null;

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
    public $items;

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
     * Set the customer information for the invoice
     *
     * @param string $name
     * @param string|integer $number
     * @param string $date
     * @return $this
     */
    public function information($name, $number, $date)
    {
        $this->name = $name;
        $this->number = $number;
        $this->date = $date;

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
        if (! $this->items) {
            $this->introLines[] = $this->formatLine($line);
        } else {
            $this->outroLines[] = $this->formatLine($line);
        }

        return $this;
    }
}