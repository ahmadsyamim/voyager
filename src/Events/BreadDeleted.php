<?php

namespace TCG\Voyager\Events;

use Illuminate\Queue\SerializesModels;
use TCG\Voyager\Models\DataType;

class BreadDeleted
{
    use SerializesModels;

    public $dataType;

    public function __construct(DataType $dataType, public $data)
    {
        $this->dataType = $dataType;

        event(new BreadChanged($dataType, $this->data, 'Deleted'));
    }
}
