<?php

namespace TomIrons\Tuxedo\Traits;

trait HasLine
{
    /**
     * The "intro" lines of the message.
     *
     * @var array
     */
    public $introLines = [];

    /**
     * The "outro" lines of the message.
     *
     * @var array
     */
    public $outroLines = [];

    /**
     * Add a line of text to the message.
     *
     * @param string|array $line
     *
     * @return $this
     */
    public function line($line)
    {
        if (trait_exists(HasAction::class) && property_exists($this, 'actionText') && !$this->actionText) {
            $this->introLines[] = $this->formatLine($line);
        }

        $this->outroLines[] = $this->formatLine($line);

        return $this;
    }

    /**
     * Format the given line of text.
     *
     * @param string|array $line
     *
     * @return $this
     */
    protected function formatLine($line)
    {
        if (is_array($line)) {
            return implode(' ', array_map('trim', $line));
        }

        return trim(implode(' ', array_map('trim', preg_split('/\\r\\n|\\r|\\n/', $line))));
    }
}
