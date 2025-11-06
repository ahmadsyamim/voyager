<?php

namespace TCG\Voyager\Events;

use Illuminate\Queue\SerializesModels;

class TableChanged
{
    use SerializesModels;

    public function __construct(public $name)
    {
    }
}
