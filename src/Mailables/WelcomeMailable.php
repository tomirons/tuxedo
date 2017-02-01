<?php

namespace TomIrons\Tuxedo\Mailables;

use Illuminate\Mail\Mailable;

class WelcomeMailable extends Mailable
{
    /**
     * The Markdown template for the message (if applicable).
     *
     * @var string
     */
    protected $markdown = 'tuxedo::templates.welcome';
}
