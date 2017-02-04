<?php

namespace Tests;

use TomIrons\Tuxedo\Mailables\AlertMailable;

class AlertMailableTest extends \PHPUnit_Framework_TestCase
{
    protected $mailable;

    public function setUp()
    {
        parent::setUp();

        $this->mailable = new AlertMailable;
    }

    public function testInfoMethod()
    {
        $this->assertInstanceOf(AlertMailable::class, $this->mailable->info());
    }

    public function testWarningMethod()
    {
        $this->assertInstanceOf(AlertMailable::class, $this->mailable->warning());
    }

    public function testSuccessMethod()
    {
        $this->assertInstanceOf(AlertMailable::class, $this->mailable->success());
    }

    public function testErrorMethod()
    {
        $this->assertInstanceOf(AlertMailable::class, $this->mailable->error());
    }

    public function testTypeMethod()
    {
        $this->assertInstanceOf(AlertMailable::class, $this->mailable->type('info'));
    }

    public function testMessageMethod()
    {
        $this->assertInstanceOf(AlertMailable::class, $this->mailable->message('Something has gone wrong, please contact support.'));
    }

    public function testGrettingMethod()
    {
        $this->assertInstanceOf(AlertMailable::class, $this->mailable->greeting('Hello!'));
    }

    public function testLineMethod()
    {
        $this->assertInstanceOf(AlertMailable::class, $this->mailable->line('Some line of text to tell you what exactly is going on.'));
    }
}
