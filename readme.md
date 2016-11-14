# Tuxedo
[![Build Status](https://travis-ci.org/tomirons/tuxedo.svg)](https://travis-ci.org/tomirons/tuxedo)
[![Version](https://img.shields.io/packagist/v/tomirons/tuxedo.svg)](https://packagist.org/packages/tomirons/tuxedo)
[![License](https://poser.pugx.org/tomirons/tuxedo/license.svg)](https://packagist.org/packages/tomirons/tuxedo)
[![Total Downloads](https://img.shields.io/packagist/dt/tomirons/tuxedo.svg)](https://packagist.org/packages/tomirons/tuxedo)

This package includes some base templates to use with Laravel's `Mail` classes.

## Contents

- [Installation](#installation)
- [Classes](#classes)
    - [ActionMailable](#actionmailable)
        - [Methods](#methods)
            - [Header](#header)
        - [Example](#example)
    - [AlertMailable](#alertmailable)
        - [Methods](#methods)
            - [type()](#type)
            - [message()](#message)
        - [Example](#example)
    - [InvoiceMailable](#invoicemailable)
        - [Methods](#methods)
            - [information()](#information)
            - [item()](#item)
        - [Example](#example)
- [License](#license)
 
## Installation

1) Run the following command:
    
    `$ composer require tomirons/tuxedo`

2) Open your `config/app.php` and add the following class to your `providers` array:
    
    `TomIrons\Tuxedo\TuxedoServiceProvider::class`
    
3) (Optional) If you would like to edit the templates, run the following command to publish them

    `php artisan vendor:publish --provider=TomIrons\Tuxedo\TuxedoServiceProvider`
 
## Classes

There are currently 3 different types of classes you can extend. `ActionMailable`, `AlertMailable`, and `InvoiceMailable`, and each have their own special properties and methods.
  
### ActionMailable

#### Methods

- header()
     
     `header('Something for a header')`