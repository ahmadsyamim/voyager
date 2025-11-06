<?php

namespace TCG\Voyager\Events;

class FileDeleted
{
    public function __construct(public $path)
    {
    }
}
