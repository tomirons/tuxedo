<?php

namespace TomIrons\Tuxedo\Concerns;

trait HasAction
{
    /**
     * The color of the button (blue, green, red).
     *
     * @var string
     */
    public $color = 'blue';

    /**
     * The text / label for the action.
     *
     * @var string
     */
    public $actionText;

    /**
     * The action URL.
     *
     * @var string
     */
    public $actionUrl;

    /**
     * Indicate that the message gives information about a general operation.
     *
     * @return $this
     */
    public function info()
    {
        return $this->color('blue');
    }

    /**
     * Indicate that the message gives information about a successful operation.
     *
     * @return $this
     */
    public function success()
    {
        return $this->color('green');
    }

    /**
     * Indicate that the message gives information about an error.
     *
     * @return $this
     */
    public function error()
    {
        return $this->color('red');
    }

    /**
     * Set the color of the message (blue, green, red).
     *
     * @param string $level
     *
     * @return $this
     */
    public function color($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Configure the "call to action" button.
     *
     * @param string $text
     * @param string $url
     *
     * @return $this
     */
    public function action($text, $url)
    {
        $this->actionText = $text;
        $this->actionUrl = $url;

        return $this;
    }
}