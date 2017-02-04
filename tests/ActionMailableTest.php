<?php

namespace Tests;

use TomIrons\Tuxedo\Mailables\ActionMailable;

class ActionMailableTest extends \PHPUnit_Framework_TestCase
{
    protected $mailable;

    public function setUp()
    {
        parent::setUp();

        $this->mailable = new ActionMailable();
    }

    public function testInfoMethod()
    {
        $this->assertInstanceOf(ActionMailable::class, $this->mailable->info());
    }

    public function testSuccessMethod()
    {
        $this->assertInstanceOf(ActionMailable::class, $this->mailable->success());
    }

    public function testErrorMethod()
    {
        $this->assertInstanceOf(ActionMailable::class, $this->mailable->error());
    }

    public function testColorMethod()
    {
        $this->assertInstanceOf(ActionMailable::class, $this->mailable->color('blue'));
    }

    public function testActionMethod()
    {
        $this->assertInstanceOf(ActionMailable::class, $this->mailable->action('Click Me', 'http://example.com'));
    }

    public function testLineMethod()
    {
        $this->assertInstanceOf(ActionMailable::class, $this->mailable->line('Some line of text to tell you what exactly is going on.'));
    }

    public function testGrettingMethod()
    {
        $this->assertInstanceOf(ActionMailable::class, $this->mailable->greeting('Hello!'));
    }
}
