<?php namespace Fideloper\Helper;

class Truncate {

    public function excerpt($content)
    {
        return filter_var($content, FILTER_SANITIZE_STRING);
    }

}