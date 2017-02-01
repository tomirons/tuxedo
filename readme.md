# Tuxedo
[![Version](https://img.shields.io/packagist/v/tomirons/tuxedo.svg)](https://packagist.org/packages/tomirons/tuxedo)
[![License](https://poser.pugx.org/tomirons/tuxedo/license.svg)](https://packagist.org/packages/tomirons/tuxedo)
[![Total Downloads](https://img.shields.io/packagist/dt/tomirons/tuxedo.svg)](https://packagist.org/packages/tomirons/tuxedo)

Tuxedo is an easy way to send transactional emails with Laravel's `Mail` classes, with the templates already done for you.

## Contents

- [Installation](#installation)
- [Classes](#classes)
    - [ActionMailable](#actionmailable)
    - [AlertMailable](#alertmailable)
    - [InvoiceMailable](#invoicemailable)
- [License](#license)

## Installation
1) Run the following command:

````shell
$ composer require tomirons/tuxedo
````
    
2) Open your `config/app.php` and add the following class to your `providers` array:

````php
TomIrons\Tuxedo\TuxedoServiceProvider::class
````
    
3) (Optional) If you would like to edit the templates, run the following command to publish them

````shell
php artisan vendor:publish --provider=TomIrons\Tuxedo\TuxedoServiceProvider
````
    
## Classes
There are currently 3 different types of classes you can extend. `ActionMailable`, `AlertMailable`, and `InvoiceMailable`, and each have their own special properties and methods.

#### General Methods
These methods are currently only available in `ActionMailable` and `AlertMailable`.
- `gretting($gretting)` - Sets the greeting for the message.
- `line($line)` - Add a line of text to the message.
  
### ActionMailable

#### Methods
- `header($header)` - Sets the header text for the message. Defaults to `Hello!`
- `color($color)` - Sets the color of the button. Available options are `blue`, `green`, and `red`.
- `action($text, $url)` - Sets the button text and url.
- `success()` - Sets the button color to `green`.
- `error()` - Sets the button color to `red`.
  
#### Example
````php
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use TomIrons\Tuxedo\Mailables\ActionMailable;

class TuxedoTestMail extends ActionMailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     */
    public function build()
    {
        return $this->header('Some Random Header')
                    ->success()
                    ->line('Some line of text to tell you what exactly is going on.')
                    ->action('Click Me', url('/'))
                    ->line('Some other information to be displayed after the button.');
    }
}
````

### AlertMailable

#### Methods
- `info()` - Sets the type of the alert to `info`.
- `warning()` - Sets the type of the alert to `warning`.
- `success()` - Sets the type of the alert to `success`.
- `error()` - Sets the type of the alert to `error`.
- `type($type)` - Sets the type of alert, options are `info`, `success`, `warning`, and `error`.
- `message($message)` - Sets the message to display in the alert.

#### Example
````php
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use TomIrons\Tuxedo\Mailables\AlertMailable;

class TuxedoTestMail extends AlertMailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     */
    public function build()
    {
        return $this->type('success')
                    ->message('A message that goes inside the alert.')
                    ->line('Some line of text to tell you what exactly is going on.');
    }
}
````

### InvoiceMailable

#### Properties
- `$keys|array` - Set which keys to use when looking for an item's name and price.

#### Methods
- `id($id)` - Sets the invoice ID.
- `name($name)` - Sets the name to begin the invoice with.
- `date($date)` - Sets the date to display at the top of the invoice table.
- `due($date)` - Sets the due date of the invoice.
- `url($url)` - Sets the URL to pay the invoice.
- `items($items)` - Add an list of items to the invoice. Acceptable variable types are `Collection` and `array`.
- `calculate($taxPercent, $shipping)` - Calculates the tax and final total, **MUST** be the last method called.

#### Example
````php
<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use TomIrons\Tuxedo\Mailables\InvoiceMailable;

class InvoiceMail extends InvoiceMailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->id(123456)
                    ->name('John Doe')
                    ->date(Carbon::now()->format('l, M j Y \a\t g:i a'))
                    ->due(Carbon::now()->addDays(7)->format('l, M j Y \a\t g:i a'))
                    ->url('https://laravel.com')
                    ->items([
                        ['product_name' => 'Example Product', 'product_price' => 123.99],
                        ['product_name' => 'Second Product', 'product_price' => 321.99]
                    ])
                    ->calculate(3, 15);
    }
}

````

## License
Tuxedo is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)