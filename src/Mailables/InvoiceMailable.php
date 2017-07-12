<?php

namespace TomIrons\Tuxedo\Mailables;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Collection;
use TomIrons\Tuxedo\Traits\HasAction;
use TomIrons\Tuxedo\Traits\HasGreeting;

class InvoiceMailable extends Mailable
{
    use HasAction,
        HasGreeting;

    /**
     * The Markdown template for the message (if applicable).
     *
     * @var string
     */
    public $markdown = 'tuxedo::templates.invoice';

    /**
     * ID of the invoice.
     *
     * @var int
     */
    public $id;

    /**
     * The invoice date.
     *
     * @var string
     */
    public $date;

    /**
     * The date the invoice is due.
     *
     * @var string
     */
    public $dueDate;

    /**
     * The cost of shipping.
     *
     * @var int
     */
    public $shipping;

    /**
     * The cost of tax.
     *
     * @var int
     */
    public $tax;

    /**
     * The invoice total.
     *
     * @var int
     */
    public $total;

    /**
     * The items that are on the invoice.
     *
     * @var Collection
     */
    public $items;

    /**
     * The keys to use when data needs retrieved.
     *
     * @var array
     */
    public $keys = ['name' => 'product_name', 'price' => 'product_price'];

    /**
     * Information to display in the table.
     *
     * @var array
     */
    public $tableData;

    /**
     * Set the id of the invoice.
     *
     * @param int $id
     *
     * @return $this
     */
    public function id($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the due date for the invoice.
     *
     * @param string $date
     *
     * @return $this
     */
    public function due($date)
    {
        $this->dueDate = $date;

        return $this;
    }

    /**
     * Set the customer information for the invoice.
     *
     * @param string $date
     *
     * @return $this
     */
    public function date($date)
    {
        $this->date = $date;

        return $this;
    }


    /**
     * Add multiple item's to the invoice.
     *
     * @param Collection|array $items
     *
     * @return $this
     */
    public function items($items)
    {
        if (!$items instanceof Collection) {
            $items = collect($items);
        }

        foreach ($items as $item) {
            $this->item($item[$this->keys['name']], $item[$this->keys['price']]);
        }

        return $this;
    }

    /**
     * Add an item to the invoice.
     *
     * @param string     $name
     * @param string|int $price
     */
    private function item($name, $price)
    {
        if (!$this->items instanceof Collection) {
            $this->items = new Collection();
        }

        $this->items->push([
            'product_name'  => $name,
            'product_price' => $price,
        ]);
    }

    /**
     * Calculate the subtotal, tax, and total.
     *
     * @param int $taxPercent
     * @param int $shipping
     *
     * @return $this
     */
    public function calculate($taxPercent = 0, $shipping = 0)
    {
        $subtotal = $this->items->sum('product_price');

        $this->tax = $subtotal * ($taxPercent / 100);

        $this->shipping = $shipping;

        $this->total = $subtotal + $this->tax + $this->shipping;

        return $this->dataToArray();
    }

    /**
     * Set the data to use in the table.
     *
     * @return $this
     */
    private function dataToArray()
    {
        $this->tableData = [
            'id'       => $this->id,
            'date'     => $this->date,
            'items'    => $this->items,
            'shipping' => $this->shipping ? number_format($this->shipping, 2) : null,
            'tax'      => $this->tax ? number_format($this->tax, 2) : null,
            'total'    => number_format($this->total, 2),
            'keys'     => $this->keys,
        ];

        return $this;
    }
}
