# Tuxedo
[![Version](https://img.shields.io/packagist/v/tomirons/tuxedo.svg)](https://packagist.org/packages/tomirons/tuxedo)
[![License](https://poser.pugx.org/tomirons/tuxedo/license.svg)](https://packagist.org/packages/tomirons/tuxedo)
[![Total Downloads](https://img.shields.io/packagist/dt/tomirons/tuxedo.svg)](https://packagist.org/packages/tomirons/tuxedo)

This package includes some base templates to use with Laravel's `Mail` classes.

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
  
### ActionMailable

#### Methods
- `header($header)` - Sets the header text for the message, it'll only be displayed if it's set.
  
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

#### Methods
- `information($name, $number, $date)` - Sets the information that gets displayed at the top invoice.
- `item($name, $price)` - Add an item to the invoice

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
        return $this->information('John Doe', '123456', date('F jS, Y'))
                    ->item('Example Product', '123.99')
                    ->item('Another Example Product', '321.99');
    }
}
````

## License
Tuxedo is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)