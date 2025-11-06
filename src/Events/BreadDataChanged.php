<?php

namespace TCG\Voyager\Events;

use Illuminate\Queue\SerializesModels;
use TCG\Voyager\Models\DataType;

class BreadDataChanged
{
    use SerializesModels;

    public $dataType;

    public function __construct(DataType $dataType, public $data, public $changeType)
    {
        $this->dataType = $dataType;
    }
}
