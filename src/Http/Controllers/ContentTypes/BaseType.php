<?php

namespace TCG\Voyager\Http\Controllers\ContentTypes;

use Illuminate\Http\Request;

abstract class BaseType
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * Password constructor.
     *
     * @param Request $request
     * @param $slug
     * @param $row
     */
    public function __construct(Request $request, /**
     * @var
     */
    protected $slug, /**
     * @var
     */
    protected $row, /**
     * @var
     */
    protected $options)
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    abstract public function handle();
}
