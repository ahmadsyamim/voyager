<?php

namespace TCG\Voyager;

use TCG\Voyager\Alert\Components\ComponentInterface;

class Alert
{
    protected $components;

    public function __construct(protected $name, protected $type = 'default')
    {
    }

    public function addComponent(ComponentInterface $component)
    {
        $this->components[] = $component;

        return $this;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __call($name, $arguments)
    {
        $component = app('voyager.alert.components.'.$name, ['alert' => $this])
            ->setAlert($this);

        call_user_func_array([$component, 'create'], $arguments);

        return $this->addComponent($component);
    }
}
