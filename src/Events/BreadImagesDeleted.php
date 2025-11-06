<?php

namespace TCG\Voyager\Events;

use Illuminate\Queue\SerializesModels;

class BreadImagesDeleted
{
    use SerializesModels;

    public function __construct(public $data, public $images)
    {
    }
}
