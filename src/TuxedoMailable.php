<?php

namespace TomIrons\Tuxedo;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\File;

class TuxedoMailable extends Mailable
{
    /**
     * The message's greeting.
     *
     * @var string|null
     */
    public $greeting = null;

    /**
     * The "body" lines of the message.
     *
     * @var array
     */
    public $lines = [];

    /**
     * Set the view and view data for the message.
     *
     * @param $name
     * @return $this
     * @throws \Exception
     */
    public function template($name)
    {
        if (File::exists(__DIR__ . '/../resources/views/' . $name . '.blade.php')) {
            $this->view = 'tuxedo::' . $name;
            $this->viewData = $this->toArray();

            return $this;
        } else {
            throw new \Exception('This template does not exist, please choose one that does.');
        }
    }

    /**
     * Set the greeting of the message.
     *
     * @param  string  $greeting
     * @return $this
     */
    public function greeting($greeting)
    {
        $this->greeting = $greeting;

        return $this;
    }

    /**
     * Add a line of text to the message.
     *
     * @param  string  $line
     * @return $this
     */
    public function line($line)
    {
        return $this->addLine($line);
    }

    /**
     * Add a line of text to the message.
     *
     * @param  string|array  $line
     * @return $this
     */
    public function addLine($line)
    {
        $this->lines[] = $this->formatLine($line);

        return $this;
    }

    /**
     * Format the given line of text.
     *
     * @param  string|array  $line
     * @return string
     */
    protected function formatLine($line)
    {
        return trim(implode(' ', array_map('trim', preg_split('/\\r\\n|\\r|\\n/', $line))));
    }

    /**
     * Get an array representation of the message.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'greeting' => $this->greeting,
            'lines' => $this->lines,
        ];
    }

}