<?php namespace Fideloper\Helper;

use Illuminate\Support\MessageBag;

class Headdata extends MessageBag {

    /**
     * Default format for message output.
     *
     * @var string
     */
    protected $format = ':message';

    /**
     * Get the last message from the bag for a given key.
     *
     * @param  string  $key
     * @param  string  $format
     * @return string
     */
    public function last($key = null, $format = null)
    {
        $messages = $this->get($key, $format);

        return (count($messages) > 0) ? $messages[count($messages)-1] : '';
    }
}