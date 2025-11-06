<?php

namespace TCG\Voyager\Events;

use Illuminate\Queue\SerializesModels;

class MediaFileAdded
{
    use SerializesModels;

    public function __construct(public $path)
    {
    }
}
