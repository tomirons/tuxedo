<?php

namespace TomIrons\Tuxedo\Mailables;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Collection;
use TomIrons\Tuxedo\Message;

class InvoiceMailable extends Mailable
{
    use Message;

    /**
     * The Markdown template for the message.
     *
     * @var string
     */
    public $markdown = 'tuxedo::html.invoice';

    /**
     * The total amount of tax
     *
     * @var string|int
     */
    public $tax;

    /**
     * The tax percentage
     *
     * @var string|int
     */
    public $taxPercent;

    /**
     * The cost of shipping
     *
     * @var string|int
     */
    public $shipping;

    /**
     * The invoice date
     *
     * @var string
     */
    public $date;

    /**
     * The total before tax and shipping
     *
     * @var string|int
     */
    public $subtotal;

    /**
     * The invoice total
     *
     * @var string|int
     */
    public $total;

    /**
     * The items that are on the invoice
     *
     * @var Collection
     */
    public $items;

    /**
     * The column to find the name of a product.
     *
     * @var string
     */
    protected $nameKey = 'product_name';

    /**
     * The column to find the price of a product.
     *
     * @var string
     */
    protected $priceKey = 'product_price';

    /**
     * Add multiple item's to the invoice
     *
     * @param Collection|array $items
     * @return $this
     */
    public function items($items)
    {
        if (! $items instanceof Collection) {
            $items = collect($items);
        }

        foreach ($items as $item) {
            $this->item($item[$this->nameKey], $item[$this->priceKey]);
        }

        return $this;
    }

    /**
     * Add an item to the invoice
     *
     * @param string $name
     * @param string|int $price
     */
    private function item($name, $price)
    {
        if (! $this->items instanceof Collection) {
            $this->items = new Collection;
        }

        $this->items->push([
            'product_name' => $name,
            'product_price' => $price
        ]);
    }

    /**
     * Calculate the subtotal, tax, and total
     *
     * @return $this
     */
    public function calculate()
    {
        $this->subtotal = $this->items->sum('product_price');

        $this->tax = $this->subtotal * ($this->taxPercent / 100);

        $this->total = $this->subtotal + $this->tax + $this->shipping;

        return $this;
    }

    /**
     * Set the customer information for the invoice
     *
     * @param string $date
     * @return $this
     */
    public function date($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Set the shipping cost
     *
     * @param string|int $shipping
     * @return $this
     */
    public function shipping($shipping)
    {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * Set the tax percentage
     *
     * @param string|int $percent
     * @return $this
     */
    public function tax($percent)
    {
        $this->taxPercent = $percent;

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