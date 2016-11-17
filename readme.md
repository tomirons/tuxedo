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
- `gretting($gretting)` - Sets the greeting for the message.
- `line($line)` - Add a line of text to the message.
  
### ActionMailable

#### Methods
- `header($header)` - Sets the header text for the message, it'll only be displayed if it's set.
- `level($level)` - Sets the level type of the button. Available options are `success` and `error`.
- `action($text, $url)` - Sets the button text and url.
- `success()` - Sets the level type to `success`.
- `error()` - Sets the level type to `error`.
  
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
                    ->level('success')
                    ->line('Some line of text to tell you what exactly is going on.')
                    ->action('Click Me', url('/'))
                    ->line('Some other information to be displayed after the button.');
    }
}
````

### AlertMailable

#### Methods
- `type($type)` - Sets the type of alert, options are `success`, `warning`, and `error`.
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
- `$nameKey` - Set the key used to find the product name when using `items()`. Defaults to `product_name`.
- `$priceKey` - Set the key used to find the product price when using `items()`. Defaults to `product_price`.

#### Methods
- `date($date)` - Sets the date to display at the top of the invoice table.
- `items($items)` - Add an list of items to the invoice. Acceptable variable types are `Collection` and `array`.
- `tax($percentage)` - Set the tax percentage to use for the invoice.
- `shipping($shipping)` - Set the cost of shipping for the invoice.
- `calculate()` - Calculates the tax and final total, **MUST** be the last method called.

#### Example
````php
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use TomIrons\Tuxedo\Mailables\InvoiceMailable;

class TuxedoTestMail extends InvoiceMailable 
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
        return $this->date(date('l, M j Y \a\t g:i a'))
                    ->items([
                        ['product_name' => 'Example Product', 'product_price' => 123.99],
                        ['product_name' => 'Second Product', 'product_price' => 321.99]
                    ])
                    ->tax(3)
                    ->shipping(15)
                    ->calculate();
    }
}
````

## License
Tuxedo is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)