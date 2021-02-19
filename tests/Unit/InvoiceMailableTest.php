<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use TomIrons\Tuxedo\Mailables\InvoiceMailable;

class InvoiceMailableTest extends TestCase
{
    protected $mailable;

    public function setUp(): void
    {
        parent::setUp();

        $this->mailable = new InvoiceMailable();
    }

    public function testIdMethod()
    {
        $this->assertInstanceOf(InvoiceMailable::class, $this->mailable->id(123456));
    }

    public function testDateMethod()
    {
        date_default_timezone_set('America/Detroit');
        $this->assertInstanceOf(InvoiceMailable::class, $this->mailable->date(date('l, M j Y \a\t g:i a')));
    }

    public function testDueMethod()
    {
        date_default_timezone_set('America/Detroit');
        $this->assertInstanceOf(InvoiceMailable::class, $this->mailable->due(date('l, M j Y \a\t g:i a', strtotime('+7 days'))));
    }

    public function testItemsMethod()
    {
        $this->assertInstanceOf(InvoiceMailable::class, $this->mailable->items([
            ['product_name' => 'Example Product', 'product_price' => 123.99],
            ['product_name' => 'Second Product', 'product_price' => 321.99],
        ]));
    }

    public function testCalcuateMethod()
    {
        $this->mailable->items([
            ['product_name' => 'Example Product', 'product_price' => 123.99],
            ['product_name' => 'Second Product', 'product_price' => 321.99],
        ]);
        $this->assertInstanceOf(InvoiceMailable::class, $this->mailable->calculate(3, 15));
    }
}
