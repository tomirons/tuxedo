<?php

namespace TomIrons\Tuxedo\Mailables;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Collection;
use TomIrons\Tuxedo\Message;
use TomIrons\Tuxedo\TuxedoInvoice;

class InvoiceMailable extends Mailable
{
    /**
     * The Markdown template for the message.
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
     * The user's name.
     *
     * @var string
     */
    public $name;

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
     * @param $id
     * @return $this
     */
    public function id($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the name of the user.
     *
     * @param $name
     * @return $this
     */
    public function name($name)
    {
        $this->namez = $name;

        return $this;
    }

    /**
     * Add multiple item's to the invoice.
     *
     * @param Collection|array $items
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
     * @param string $name
     * @param string|int $price
     */
    private function item($name, $price)
    {
        if (!$this->items instanceof Collection) {
            $this->items = new Collection;
        }

        $this->items->push([
            'product_name' => $name,
            'product_price' => $price
        ]);
    }

    /**
     * Set the due date for the invoice.
     *
     * @param string $date
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
     * @return $this
     */
    public function date($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Calculate the subtotal, tax, and total.
     *
     * @return $this
     */
    public function calculate($taxPercent, $shipping = 0)
    {
        $subtotal = $this->items->sum('product_price');

        $this->tax = $subtotal * ($taxPercent / 100);

        $this->shipping = $shipping;

        $this->total = $subtotal + $this->tax + $this->shipping;

        $this->dataToArray();
    }

    /**
     * Set the data to use in the table.
     *
     * @return $this
     */
    private function dataToArray()
    {
        $this->tableData = [
            'id' => $this->id,
            'date' => $this->date,
            'items' => $this->items,
            'shipping' => number_format($this->shipping, 2),
            'tax' => number_format($this->tax, 2),
            'total' => number_format($this->total, 2),
            'keys' => $this->keys
        ];

        return $this;
    }
}