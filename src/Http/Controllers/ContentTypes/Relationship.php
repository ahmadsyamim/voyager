<?php

namespace TCG\Voyager\Http\Controllers\ContentTypes;

class Relationship extends BaseType
{
    /**
     * @return array
     */
    public function handle()
    {
        $content = $this->request->input($this->row->field);
        if (is_array($content)) {
            $content = array_filter($content, fn($value) => $value !== null);
        }

        return $content;
    }
}
