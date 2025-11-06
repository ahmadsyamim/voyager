<?php

namespace TCG\Voyager\Events;

use Illuminate\Queue\SerializesModels;

class TableDeleted
{
    use SerializesModels;

    public function __construct(public $name)
    {
        event(new TableChanged($this->name, 'Deleted'));
    }
}
