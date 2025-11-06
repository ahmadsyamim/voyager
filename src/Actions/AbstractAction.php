<?php

namespace TCG\Voyager\Actions;

abstract class AbstractAction implements ActionInterface
{
    public function __construct(protected $dataType, protected $data)
    {
    }

    public function getDataType()
    {
    }

    public function getPolicy()
    {
    }

    public function getRoute($key)
    {
        if (method_exists($this, $method = 'get'.ucfirst((string) $key).'Route')) {
            return $this->$method();
        } else {
            return $this->getDefaultRoute();
        }
    }

    public function getAttributes()
    {
        return [];
    }

    public function convertAttributesToHtml()
    {
        $result = [];

        foreach ($this->getAttributes() as $key => $attribute) {
            $result[] = sprintf('%s="%s"', $key, $attribute);
        }

        return implode(" ", $result);
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->name === $this->getDataType() || $this->getDataType() === null;
    }

    public function shouldActionDisplayOnRow($row)
    {
        return true;
    }
}
